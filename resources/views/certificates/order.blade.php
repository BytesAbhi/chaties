@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Order Printed Certificate</div>
    <div class="card-body">
        @if($order)
            <p>Delivery Status: {{ $order->status }}</p>
        @else
            <form method="POST" action="{{ route('certificates.order.store') }}">
                @csrf
                <input type="hidden" name="participant_id" value="{{ $participant->id }}">
                <div class="form-group">
                    <label for="address">Delivery Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Order Certificate (₹199)</button>
            </form>
        @endif
    </div>
</div>
@endsection