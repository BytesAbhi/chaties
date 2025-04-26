@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Dashboard</h2>
        <div>
            <span class="mr-4 font-semibold text-gray-600">Welcome, {{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </div>
    <div>
    <a href="{{ route('certificate.download') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        Download Certificate
    </a>
</div>

    <!-- Participant Info -->
    <div class="bg-white rounded shadow p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">👤 Your Profile</h3>
        <div class="space-y-4">
            <div>
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="rounded-full w-32 h-32">
            </div>
            <div>
                <strong>Name:</strong> {{ Auth::user()->name }}
            </div>
            <div>
                <strong>Email:</strong> {{ Auth::user()->email }}
            </div>
            <div>
                <strong>Mobile:</strong> {{ Auth::user()->mobile }}
            </div>
            <div>
                <strong>Certificate Option:</strong> 
                {{ Auth::user()->certificate_option ? Auth::user()->certificate_option : 'Not selected' }}
            </div>
            <div>
                <!-- Update the Edit route to use Auth::user()->id -->
                <a href="{{ route('participants.edit', Auth::user()->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            </div>
        </div>
    </div>

   

</div>

<!-- GPS Script (Remove if unnecessary) -->
<script>
var participants = @json($participants); // This is currently unused, you can remove it if unnecessary

// Log the participants data to the browser console
console.log(participants);

// If you want to log a specific participant's data, for example the first one:
if (participants.length > 0) {
    console.log('First participant:', participants[0]);
}

// GPS functionality to automatically set latitude and longitude fields (if needed)
// (This part is currently unused in your form, remove it if not necessary)
navigator.geolocation.getCurrentPosition(position => {
    document.querySelectorAll('[name^="latitude"]').forEach(input => {
        input.value = position.coords.latitude;
    });
    document.querySelectorAll('[name^="longitude"]').forEach(input => {
        input.value = position.coords.longitude;
    });
});

// Show/hide delivery address based on certificate option selection
document.querySelectorAll('[name="certificate_option"]').forEach(radio => {
    radio.addEventListener('change', () => {
        document.getElementById('address-fields').style.display =
            radio.value === 'both' ? 'block' : 'none';
    });
});
</script>
@endsection
