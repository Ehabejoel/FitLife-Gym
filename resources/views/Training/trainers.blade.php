@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($trainers as $trainer)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $trainer->profile_image }}" class="card-img-top trainer-image" alt="{{ $trainer->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $trainer->name }}</h5>
                    <p class="card-text">{{ $trainer->bio }}</p>
                    <div class="specialties mb-3">
                        @foreach($trainer->specialties as $specialty)
                        <span class="badge bg-primary">{{ $specialty }}</span>
                        @endforeach
                    </div>
                    <div class="schedule-info">
                        <h6>Available Classes:</h6>
                        <ul class="list-unstyled">
                            @foreach($trainer->classes as $class)
                            <li>
                                {{ $class->name }} - 
                                {{ $class->schedule->format('l H:i') }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" 
                            data-bs-target="#bookTrainer" 
                            data-trainer-id="{{ $trainer->id }}">
                        Book Session
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookTrainer" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Book Training Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('training.book') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="trainer_id" id="trainer_id">
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Time Slot</label>
                        <select name="time_slot" class="form-control" required>
                            @foreach($timeSlots as $slot)
                            <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Book Session</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
