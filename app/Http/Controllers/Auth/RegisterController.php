<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            \Log::info('Registration attempt for email: ' . $request->email);
            $request->validate([
                'email' => 'required|email|unique:participants,email',
                'mobile' => 'required|string|min:10|max:15',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = Participant::create([
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);

            \Log::info('User created: ' . $user->id);

            Auth::login($user);

            \Log::info('User logged in: ' . Auth::check());

            return redirect('/userdashboard')->with('success', 'Registration successful!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::warning('Validation failed: ' . json_encode($e->errors()));
            throw $e;
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Database error during registration: ' . $e->getMessage());
            return redirect()->back()->with('error', 'A database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            \Log::error('Unexpected error: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = Participant::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = Participant::create([
                   'email' => $googleUser->email,
                'name' => $googleUser->name,
                'password' => Hash::make(uniqid()),
                'google_id' => $googleUser->id,
                'mobile' => '0000000000', // Placeholder
                ]);
            }

            Auth::login($user);
            return redirect('/userdashboard')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            \Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('register')->with('error', $e->getMessage());
        }
    }
}