@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Training Sessions</div>
        <div class="card-body">
            <h5>Available Sessions</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Trainer</th>
                        <th>Date & Time</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($availableSessions as $session)
                    <tr>
                        <td>{{ $session->title }}</td>
                        <td>{{ $session->trainer->name }}</td>
                        <td>{{ $session->datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ $session->members()->count() }}/{{ $session->capacity }}</td>
                        <td>
                            @if(!$session->isFullyBooked())
                            <form method="POST" action="{{ route('member.training.book', $session->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Book</button>
                            </form>
                            @else
                            <span class="badge bg-danger">Full</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 class="mt-4">My Bookings</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Trainer</th>
                        <th>Date & Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myBookings as $booking)
                    <tr>
                        <td>{{ $booking->title }}</td>
                        <td>{{ $booking->trainer->name }}</td>
                        <td>{{ $booking->datetime->format('Y-m-d H:i') }}</td>
                        <td>
                            <form method="POST" action="{{ route('member.training.cancel', $booking->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
