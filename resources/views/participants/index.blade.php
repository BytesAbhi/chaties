@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Add Participant</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Certificate Option</th>
                    <th>Photos</th>
                    <th>Certificates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $participant)
                    <tr>
                        <td>{{ $participant->name }}</td>
                        <td>{{ $participant->certificate_option }}</td>
                        <td>
                            @if($participant->photos->isEmpty())
                                <form action="{{ route('photos.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="participant_id" value="{{ $participant->id }}">
                                    <input type="file" name="flag_photo" accept="image/*" required>
                                    <input type="file" name="participant_photo" accept="image/*" required>
                                    <input type="hidden" name="latitude" id="latitude-{{ $participant->id }}">
                                    <input type="hidden" name="longitude" id="longitude-{{ $participant->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary">Upload Photos</button>
                                </form>
                            @else
                                Uploaded
                            @endif
                        </td>
                        <td>
                            @if($participant->certificate_unlocked)
                                <a href="{{ route('certificates.download', $participant) }}" class="btn btn-sm btn-success">Download e-Certificate</a>
                            @endif
                            @if($participant->certificate_option === 'combo')
                                <a href="{{ route('certificates.order', $participant) }}" class="btn btn-sm btn-info">Order Printed</a>
                            @endif
                        </td>
                        <td>
                            <!-- Add edit/delete buttons if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Get GPS coordinates
    navigator.geolocation.getCurrentPosition(position => {
        document.querySelectorAll('[yourself('[id^="latitude-"]').forEach(input => {
            input.value = position.coords.latitude;
        });
        document.querySelectorAll('[id^="longitude-"]').forEach(input => {
            input.value = position.coords.longitude;
        });
    });
</script>
@endsection