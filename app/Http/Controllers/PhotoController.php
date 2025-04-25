<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'flag_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'participant_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simulate Google Vision API face match
        $faceMatchApproved = $this->verifyFaceMatch($request->participant_photo);

        $flagPath = $request->file('flag_photo')->store('photos', 'public');
        $participantPath = $request->file('participant_photo')->store('photos', 'public');

        Photo::create([
            'participant_id' => $request->participant_id,
            'flag_photo' => $flagPath,
            'participant_photo' => $participantPath,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $faceMatchApproved ? 'approved' : 'rejected',
        ]);

        if ($faceMatchApproved) {
            Participant::find($request->participant_id)->update(['certificate_unlocked' => true]);
        }

        return redirect()->route('dashboard')->with('success', 'Photos uploaded successfully');
    }

    private function verifyFaceMatch($photo)
    {
        // Placeholder for Google Vision API integration
        return true; // Simulated approval
    }
}