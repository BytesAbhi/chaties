<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Auth::user()->participants;
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required',
            'certificate_option' => 'required|in:e-certificate,combo',
        ]);

        $path = $request->file('profile_picture')->store('profiles', 'public');

        Participant::create([
            'user_id' => Auth::id(),
            'profile_picture' => $path,
            'name' => $request->name,
            'parent_name' => $request->parent_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'certificate_option' => $request->certificate_option,
            'certificate_price' => $request->certificate_option === 'e-certificate' ? 99 : 199,
        ]);

        return redirect()->route('dashboard')->with('success', 'Participant added successfully');
    }
}