<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\CertificateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function download()
    {
        $user = Auth::user();
    
        $pdf = Pdf::loadView('certificate.template', compact('user'));
        return $pdf->download('certificate_' . $user->name . '.pdf');
    }
    public function order(Participant $participant)
    {
        $order = CertificateOrder::where('participant_id', $participant->id)->first();
        return view('certificates.order', compact('participant', 'order'));
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'address' => 'required|string',
        ]);

        CertificateOrder::create([
            'participant_id' => $request->participant_id,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Certificate ordered successfully');
    }
}