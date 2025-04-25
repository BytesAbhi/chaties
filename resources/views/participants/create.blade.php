@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Add Participant</h2>
        <form method="POST" action="{{ route('participants.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                <input type="file" name="profile_picture" accept="image/*" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Participant Name</label>
                <input type="text" name="name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="parent_name" class="block text-sm font-medium text-gray-700">Parent Name</label>
                <input type="text" name="parent_name" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" name="mobile" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="certificate_option" class="block text-sm font-medium text-gray-700">Certificate Option</label>
                <select name="certificate_option" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="e-certificate">e-Certificate (₹99)</option>
                    <option value="combo">e-Certificate + Printed (₹199)</option>
                </select>
            </div>
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow">
                    Add Participant
                </button>
            </div>
        </form>
    </div>
@endsection
