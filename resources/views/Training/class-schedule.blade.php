@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Class Schedule</span>
            <div class="btn-group">
                <button class="btn btn-outline-primary" data-filter="today">Today</button>
                <button class="btn btn-outline-primary" data-filter="week">This Week</button>
                <button class="btn btn-outline-primary" data-filter="month">This Month</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Time</th>
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <th>{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timeSlots as $time)
                        <tr>
                            <td>{{ $time }}</td>
                            @foreach($schedule[$time] as $class)
                            <td>
                                @if($class)
                                <div class="class-slot">
                                    <strong>{{ $class->name }}</strong><br>
                                    <small>{{ $class->trainer->name }}</small><br>
                                    <span class="badge bg-info">{{ $class->spots_left }} spots left</span>
                                </div>
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
