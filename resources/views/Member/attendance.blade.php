@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">My Attendance History</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date->format('Y-m-d') }}</td>
                        <td>{{ $attendance->check_in->format('H:i') }}</td>
                        <td>{{ $attendance->check_out ? $attendance->check_out->format('H:i') : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
