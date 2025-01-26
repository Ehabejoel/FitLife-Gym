@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Export Reports</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Member Reports</h5>
                            <form action="{{ route('reports.export.members') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Date Range</label>
                                    <select name="date_range" class="form-control">
                                        <option value="today">Today</option>
                                        <option value="week">This Week</option>
                                        <option value="month">This Month</option>
                                        <option value="custom">Custom Range</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Format</label>
                                    <select name="format" class="form-control">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                        <option value="csv">CSV</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Export Members</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Financial Reports</h5>
                            <form action="{{ route('reports.export.financial') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Report Type</label>
                                    <select name="report_type" class="form-control">
                                        <option value="revenue">Revenue Report</option>
                                        <option value="membership">Membership Report</option>
                                        <option value="classes">Classes Report</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Period</label>
                                    <input type="month" name="period" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Export Financial</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5>Recent Exports</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Report Type</th>
                                <th>Format</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentExports as $export)
                            <tr>
                                <td>{{ $export->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $export->type }}</td>
                                <td>{{ strtoupper($export->format) }}</td>
                                <td>{{ $export->status }}</td>
                                <td>
                                    @if($export->status === 'completed')
                                    <a href="{{ route('reports.download', $export->id) }}" 
                                       class="btn btn-sm btn-success">
                                        Download
                                    </a>
                                    @endif
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
