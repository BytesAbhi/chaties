<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\CertificateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function download(Participant $participant)
    {
        if (!$participant->certificate_unlocked) {
            return redirect()->route('dashboard')->with('error', 'Certificate not unlocked');
        }

        // Generate PDF (placeholder)
        $pdf = 'Certificate for ' . $participant->name; // Implement actual PDF generation
        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="certificate.pdf"');
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