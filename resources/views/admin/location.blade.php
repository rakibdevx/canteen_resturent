@extends('layouts.admin')

@section('title', 'Admin - Addresses')
@push('styles')
    <!-- base:css -->
    <link rel="stylesheet" href="/admin_resources/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="/admin_resources/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admin_resources/css/vertical-layout-light/style.css">

@endpush

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        @include('partials.message-bag')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Addresses ({{ $addresses->count() }})</span>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                    Add Address
                </button>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($addresses as $address)
                        <tr>
                            <td>
                                {{ $address->building_name }},
                                Floor{{ $address->floor }},
                                Room {{ $address->room_no }},
                                {{ $address->department }},
                                {{ $address->campus }}
                            </td>

                            <td>
                                <button class="btn btn-success btn-sm edit-btn"
                                    data-id="{{ $address->id }}"
                                    data-building="{{ $address->building_name }}"
                                    data-floor="{{ $address->floor }}"
                                    data-room="{{ $address->room_no }}"
                                    data-department="{{ $address->department }}"
                                    data-campus="{{ $address->campus }}"
                                    data-notes="{{ $address->notes }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    Edit
                                </button>

                                <button class="btn btn-danger btn-sm delete-btn"
                                    data-id="{{ $address->id }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">No addresses found</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        {{-- CREATE MODAL --}}
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.addresses.store') }}">
                    @csrf
                    <div class="modal-content p-3">

                        <input type="text" name="building_name" class="form-control mb-2" placeholder="Building Name" required>
                        <input type="number" name="floor" class="form-control mb-2" placeholder="Floor">
                        <input type="text" name="room_no" class="form-control mb-2" placeholder="Room No">
                        <input type="text" name="department" class="form-control mb-2" placeholder="Department">
                        <input type="text" name="campus" class="form-control mb-2" placeholder="Campus">
                        <textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>

                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <form method="POST" id="editForm">
                    @csrf
                    @method('post')

                    <div class="modal-content p-3">

                        <input type="text" name="building_name" id="editBuilding" class="form-control mb-2" placeholder="Building Name" required>
                        <input type="number" name="floor" id="editFloor" class="form-control mb-2" placeholder="Floor">
                        <input type="text" name="room_no" id="editRoom" class="form-control mb-2"  placeholder="Room No">
                        <input type="text" name="department" id="editDepartment" class="form-control mb-2" placeholder="Department">
                        <input type="text" name="campus" id="editCampus" class="form-control mb-2" placeholder="Campus">
                        <textarea name="notes" id="editNotes" class="form-control mb-2" placeholder="Notes"></textarea>

                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- DELETE MODAL --}}
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <form method="POST" id="deleteForm">
                    @csrf
                    @method('POST')

                    <div class="modal-content p-3">
                        <p>Are you sure?</p>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
@push('scripts')
<script src="/admin_resources/vendors/js/vendor.bundle.base.js"></script>
<script src="/admin_resources/js/off-canvas.js"></script>
<script src="/admin_resources/js/hoverable-collapse.js"></script>
<script src="/admin_resources/js/template.js"></script>
<script src="/admin_resources/js/settings.js"></script>
<script src="/admin_resources/js/todolist.js"></script>
<!-- plugin js for this page -->
<script src="/admin_resources/vendors/progressbar.js/progressbar.min.js"></script>
<script src="/admin_resources/vendors/chart.js/Chart.min.js"></script>
<!-- Custom js for this page-->
<script src="/admin_resources/js/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {

    $('.edit-btn').click(function () {
        let id = $(this).data('id');

        $('#editBuilding').val($(this).data('building'));
        $('#editFloor').val($(this).data('floor'));
        $('#editRoom').val($(this).data('room'));
        $('#editDepartment').val($(this).data('department'));
        $('#editCampus').val($(this).data('campus'));
        $('#editNotes').val($(this).data('notes'));

        let url = "{{ route('admin.addresses.update', ':id') }}".replace(':id', id);
        $('#editForm').attr('action', url);
    });

    $('.delete-btn').click(function () {
        let id = $(this).data('id');
        let url = "{{ route('admin.addresses.destroy', ':id') }}".replace(':id', id);
        $('#deleteForm').attr('action', url);
    });

});
</script>
@endpush
