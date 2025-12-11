@extends('admin.layouts.master')
@section('content')

{{-- CSRF for any POST/DELETE actions (like delete button) --}}
<meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Home Slider</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itemModal">Create Slider</button>
        </div>

        <!-- Modal Structure -->
        <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itemModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="display_order" class="form-label">Display Order</label>
                                <input type="number" name="display_order" id="display_order" class="form-control"
                                    placeholder="Enter Display Number" required>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                    placeholder="Enter Description"></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- ---------END Modal --}}
        {{-- ---------E D I T Modal --}}

        <!-- Edit Button -->
        <!-- Modal for Editing Slider -->
        <div class="modal fade" id="editSliderModal" tabindex="-1" aria-labelledby="editSliderModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSliderModalLabel">Edit Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editSliderForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editSliderId" name="id">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="editTitle" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDisplayOrder" class="form-label">Display Order</label>
                                <input type="number" class="form-control" id="editDisplayOrder" name="display_order"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editDescription" name="description"
                                    required>{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-control" id="editStatus" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="editImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="editImage" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ---------END Modal --}}
        <div class="card">
            <div class="card-body">
                <table id="users-table" class="table table-striped table-bordered align-middle" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Display Order</th>
                            <th>title</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let table; // Global declaration

    $(function () {
            table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            searchDelay: 350,
            order: [[3, 'desc']], // default sort by created_at
            ajax: {
                url: "{{ route('home.slider') }}",                
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '60px' },
                { data: 'display_order',       name: 'display_order' },
                { data: 'title',      name: 'title' },
                { data: 'description',      name: 'description' },
                 {
                data: 'status',
                name: 'status',
                render: function (data, type, row) {
                    // ✅ clickable badge
                    const badgeClass = data == 1 ? 'bg-success' : 'bg-danger';
                    const text = data == 1 ? 'Active' : 'Inactive';
                    return `<span class="badge ${badgeClass} toggle-status" data-id="${row.id}" data-status="${data}" style="cursor:pointer;">${text}</span>`;
                }
            },
                { data: 'image',      name: 'image' },               
                { data: 'action',     name: 'action', orderable: false, searchable: false, width: '160px' },
            ],
            language: {
                processing: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
            }
        });
        
        $(document).on('click', '[data-action="delete"]', function () {
            const id = $(this).data('id');
            if (!confirm('Delete this user?')) return;

            $.ajax({
                url: `/admin/home-slider/${id}`,
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function () {
                    table.ajax.reload(null, false);
                     alert(xhr?.responseJSON?.message || 'Delete Successfully.');
                },
                error: function (xhr) {
                    alert(xhr?.responseJSON?.message || 'Delete failed.');
                }
            });
        });
    });

    // 🔁 Toggle Status without new route (using existing update endpoint)
$(document).on('click', '.toggle-status', function () {
    const id = $(this).data('id');
    const currentStatus = $(this).data('status');
    const newStatus = currentStatus == 1 ? 0 : 1;

    let formData = new FormData();
    formData.append('status', newStatus);

    $.ajax({
        url: `/admin/home-slider/update/${id}`, // ✅ reuse your update route
        type: 'POST',
        data: formData,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: false,
        processData: false,
        success: function (response) {
        toastr.success('Slider updated successfully!');
            $('#users-table').DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            alert(xhr.responseJSON?.message || 'Failed to update status.');
        }
    });
});


$(document).ready(function () {
    $(document).on('click', '.editBtn', function () {
        const id = $(this).data('id');
        
        $.ajax({
            url: `/admin/home-slider/edit/${id}`,
            method: 'GET',
            success: function (data) {
                $('#editSliderId').val(data.id);
                $('#editTitle').val(data.title);
                $('#editDisplayOrder').val(data.display_order);
                $('#editDescription').val(data.description);
               $('#editStatus').val(data.status == 1 ? '1' : '0');
                if (data.image) {
                    $('#currentImage').html(`<img src="/slider/${data.image}" width="100" />`);
                } else {
                    $('#currentImage').html('');
                }
                $('#editSliderModal').modal('show');
            },
            error: function () {
                alert('Failed to fetch data.');
            }
        });
    });

    // Handle form submission for update
    $('#editSliderForm').submit(function (e) {
        e.preventDefault();
        let id = $('#editSliderId').val();
        let formData = new FormData(this);        

        $.ajax({
            url: `home-slider/update/${id}`,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            success: function (response) {
                 table.ajax.reload(null, false);
                $('#editSliderModal').modal('hide');
                  toastr.success('Slider updated successfully!');
            },
            error: function (xhr) {
                let msg = xhr.responseJSON?.message || 'Update failed.';
                 toastr.error(msg);
            }
        });
    });
});






    </script>

    @endsection