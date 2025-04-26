@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Edit Participant</h2>
    </div>

    <!-- Edit Participant Form -->
    <div class="bg-white rounded shadow p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">✏️ Edit Your Details</h3>
        <form action="{{ route('participants.update', $participant->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT') <!-- This ensures the form uses the PUT method for updates -->

            <!-- Profile Picture -->
            <input type="file" name="profile_picture" class="block w-full border rounded p-2" value="{{ $participant->profile_picture }}">

            <!-- Name -->
            <input type="text" name="name" placeholder="Participant Name" class="block w-full border rounded p-2 bg-gray-200" value="{{ $participant->name }}" disabled>
<input type="email" name="email" placeholder="Email" class="block w-full border rounded p-2 bg-gray-200" value="{{ $participant->email }}" disabled>

            <!-- Mobile -->
            <input type="tel"  name="mobile" placeholder="Mobile" class="block w-full border rounded p-2" value="{{ $participant->mobile }}">

            <!-- Certificate Option -->
            <div class="flex gap-4">
                <label class="flex items-center">
                    <input type="radio" name="certificate_option" value="e-certificate" class="mr-2" {{ $participant->certificate_option == 'e-certificate' ? 'checked' : '' }}> e-Certificate: ₹99
                </label>
                <label class="flex items-center">
                    <input type="radio" name="certificate_option" value="both" class="mr-2" {{ $participant->certificate_option == 'both' ? 'checked' : '' }}> e-Certificate + Printed: ₹199
                </label>
            </div>

            <!-- Delivery Address (only show if "both" option is selected) -->
            <div id="address-fields" class="{{ $participant->certificate_option == 'both' ? 'block' : 'hidden' }}">
                <textarea name="delivery_address" placeholder="Delivery Address" class="w-full border rounded p-2">{{ $participant->delivery_address }}</textarea>
            </div>

            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
</div>

<script>
// Show/hide delivery address based on certificate option
document.querySelectorAll('[name="certificate_option"]').forEach(radio => {
    radio.addEventListener('change', () => {
        document.getElementById('address-fields').style.display =
            radio.value === 'both' ? 'block' : 'none';
    });
});
</script>
@endsection
