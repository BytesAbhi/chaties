<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Auth::user();
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

        return redirect()->route('userdashboard')->with('success', 'Participant added successfully');
    }

    public function edit($id)
{
    // Retrieve the participant by ID (ensure the user is the owner of the data)
    $participant = Participant::findOrFail($id);

    // Pass the participant data to the edit view
    return view('participants.edit', compact('participant'));
}

public function update(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'profile_picture' => 'nullable|image|max:1024',  // Optional file validation
       
        'mobile' => 'required|string|max:15',
        'certificate_option' => 'nullable|string',
        'delivery_address' => 'nullable|string',
    ]);

    // Retrieve the participant by ID
    $participant = Participant::findOrFail($id);

    // Update the participant data
    if ($request->hasFile('profile_picture')) {
        // Handle the file upload and update the profile picture
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $participant->profile_picture = $profilePicturePath;
    }

    // Update other fields
  
    $participant->mobile = $request->input('mobile');
    $participant->certificate_option = $request->input('certificate_option');
    $participant->delivery_address = $request->input('delivery_address');
    $participant->save();

    // Redirect back to the dashboard or another page
    return redirect()->route('userdashboard')->with('success', 'Participant data updated successfully');
}

}