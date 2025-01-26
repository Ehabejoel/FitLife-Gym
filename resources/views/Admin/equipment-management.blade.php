@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Equipment Management</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEquipmentModal">
                Add Equipment
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="equipmentTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Last Maintained</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipment as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'Working' ? 'success' : 'danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>{{ $item->last_maintained->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="editEquipment({{ $item->id }})">Edit</button>
                                <button class="btn btn-sm btn-warning" onclick="maintenance({{ $item->id }})">Maintenance</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteEquipment({{ $item->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.equipment-modal')
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#equipmentTable').DataTable();
    });
</script>
@endpush
