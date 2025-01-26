@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6>Active Members</h6>
                    <h2>{{ $statistics['activeMembers'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6>Monthly Revenue</h6>
                    <h2>${{ number_format($statistics['monthlyRevenue'], 2) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6>Classes Today</h6>
                    <h2>{{ $statistics['classesToday'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h6>Attendance Rate</h6>
                    <h2>{{ $statistics['attendanceRate'] }}%</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Member Activity</div>
                <div class="card-body">
                    <canvas id="memberActivityChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Revenue Analysis</div>
                <div class="card-body">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/charts.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        initMemberActivityChart(@json($charts['memberActivity']));
        initRevenueChart(@json($charts['revenue']));
    });
</script>
@endpush

@endsection
