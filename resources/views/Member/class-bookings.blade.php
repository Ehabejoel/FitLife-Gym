@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">My Class Bookings</div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col">
                    <h5>Available Classes</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Instructor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($availableClasses as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->instructor->name }}</td>
                                <td>{{ $class->date->format('Y-m-d') }}</td>
                                <td>{{ $class->time->format('H:i') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('member.classes.book', $class->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Book</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h5>My Bookings</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($myBookings as $booking)
                            <tr>
                                <td>{{ $booking->class->name }}</td>
                                <td>{{ $booking->class->date->format('Y-m-d') }}</td>
                                <td>{{ $booking->class->time->format('H:i') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('member.classes.cancel', $booking->id) }}">
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
    </div>
</div>
@endsection
