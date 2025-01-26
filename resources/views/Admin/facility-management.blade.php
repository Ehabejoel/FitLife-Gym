@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Facility Management</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFacilityModal">
                Add Facility
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="facilitiesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facilities as $facility)
                        <tr>
                            <td>{{ $facility->id }}</td>
                            <td>{{ $facility->name }}</td>
                            <td>{{ $facility->description }}</td>
                            <td>{{ $facility->capacity }}</td>
                            <td>
                                <span class="badge badge-{{ $facility->status ? 'success' : 'danger' }}">
                                    {{ $facility->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="editFacility({{ $facility->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFacility({{ $facility->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.facility-modal')
@endsection
