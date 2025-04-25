@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="mobile" class="block mb-1 text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" name="mobile" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="w-full py-2 mt-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Register</button>
        </form>

        <div class="mt-6 space-y-2 text-center">
            <p class="text-gray-500">or sign up with</p>
            <div class="flex flex-col gap-2">
                <a href="#" class="flex items-center justify-center w-full py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600">
                    Sign Up with Google
                </a>
                <a href="#" class="flex items-center justify-center w-full py-2 text-sm text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Sign Up with Facebook
                </a>
                <a href="#" class="flex items-center justify-center w-full py-2 text-sm text-white bg-cyan-500 rounded-lg hover:bg-cyan-600">
                    Sign Up with Chaties
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
