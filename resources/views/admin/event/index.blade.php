@extends('admin.layouts.master')
@section('content')

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
            <h1 class="h3 mb-0">Event List</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itemModal">Create event</button>
        </div>

        <!-- Modal Structure -->
        <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itemModalLabel">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body row">
                                <div class="mb-3 col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name"
                                        required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" placeholder="Sub Title" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label>Vanue</label>
                                    <input type="text" name="location" placeholder="Enter Vanue" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Price</label>
                                    <input type="number" name="price" placeholder="Enter Price" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Tickets</label>
                                    <input type="number" name="num_tickets" class="form-control" value="0">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Start Date</label>
                                    <input type="datetime-local" name="start_date" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>End Date</label>
                                    <input type="datetime-local" name="end_date" class="form-control" required>
                                </div>

                                <div class="mb-3 col-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3"
                                        placeholder="Enter Description"></textarea>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image[]" accept="image/*" class="form-control" multiple>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ---------E D I T Modal --}}

        <!-- Edit Button -->
        <!-- Modal for Editing event -->
        <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editeventForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="editId" name="id">

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="editName">Name</label>
                                    <input type="text" name="name" id="editName" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editSubTitle">Sub Title</label>
                                    <input type="text" name="sub_title" id="editSubTitle" class="form-control">
                                </div>

                                {{-- <div class="mb-3 col-md-6">
                                    <label for="editCategory">Category</label>
                                    <input type="text" name="category" id="editCategory" class="form-control">
                                </div> --}}
                                <div class="mb-3 col-md-6">
                                    <label for="editCategory">Category</label>
                                    <select name="category_id" id="editCategory" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editLocation">Location</label>
                                    <input type="text" name="location" id="editLocation" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editPrice">Price</label>
                                    <input type="number" name="price" id="editPrice" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editTickets">Tickets</label>
                                    <input type="number" name="num_tickets" id="editTickets" class="form-control"
                                        value="0">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editStartDate">Start Date</label>
                                    <input type="datetime-local" name="start_date" id="editStartDate"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="editEndDate">End Date</label>
                                    <input type="datetime-local" name="end_date" id="editEndDate" class="form-control"
                                        required>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="editDescription">Description</label>
                                    <textarea name="description" id="editDescription" class="form-control"
                                        rows="3"></textarea>
                                </div>

                                {{-- <div class="mb-3 col-md-6">
                                    <label for="editStatus">Status</label>
                                    <select name="status" id="editStatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div> --}}

                                <div class="mb-3 col-md-6">
                                    <label for="editImage">Image</label>
                                    <input type="file" name="image[]" id="editImage" accept="image/*"
                                        class="form-control" multiple>
                                </div>

                                <div class="mb-3 col-12" id="currentImage">
                                    <!-- Existing image preview will be loaded here -->
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------END Modal --}}

    <div class="card">
        <div class="card-body">
            <table id="users-table" class="table table-striped table-bordered align-middle" style="width:100%;">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Vanue</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    </div>
    <script>
        let table;
        $(function () {
        table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            searchDelay: 350,
            order: [[3, 'desc']], // default sort by created_at
            ajax: {
                url: "{{ route('events') }}",                
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '60px' },
                { data: 'name', name: 'name' },
                { data: 'category_name', name: 'category_name' },
                { data: 'location', name: 'location' },
                {
                    data: 'start_date',
                    name: 'start_date',
                    render: d => d ? new Date(d).toLocaleString('en-GB', {
                        day: '2-digit', month: 'short', year: 'numeric',
                        hour: '2-digit', minute: '2-digit', hour12: true
                    }) : '-'
                },
                {
                    data: 'end_date',
                    name: 'end_date',
                    render: d => d ? new Date(d).toLocaleString('en-GB', {
                        day: '2-digit', month: 'short', year: 'numeric',
                        hour: '2-digit', minute: '2-digit', hour12: true
                    }) : '-'
                },

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
                { data: 'image', name: 'image' },
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
                url: `events/${id}`,
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function () {
                    table.ajax.reload(null, false);
                      toastr.success('Slider Delete Successfully!');
                },
                error: function (xhr) {
                    toastr.error('Error in Slider delete!');
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
        url: `/admin/events/update/${id}`, // ✅ reuse your update route
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
             toastr.error('Error in Slider updated!');
        }
    });
});


$(document).ready(function () {
    $(document).on('click', '.editBtn', function () {
        const id = $(this).data('id');       
        $.ajax({
           url: "{{ route('events.edit', ':id') }}".replace(':id', id),
            method: 'GET',
            success: function (data) {
                function formatDateForInput(datetime) {
                if (!datetime) return '';
                // Convert 'YYYY-MM-DD HH:MM:SS' → 'YYYY-MM-DDTHH:MM'
                return datetime.replace(' ', 'T').slice(0, 16);
            }
                 $('#editId').val(data.id);
                $('#editName').val(data.name);
                $('#editSubTitle').val(data.sub_title);
                $('#editCategory').val(data.category_id);
                $('#editLocation').val(data.location);
                $('#editPrice').val(data.price);
                $('#editTickets').val(data.num_tickets);
                $('#editStartDate').val(formatDateForInput(data.start_date));
                $('#editEndDate').val(formatDateForInput(data.end_date));
                $('#editDescription').val(data.description);
                //  if (data.status == 1 || data.status === 'Active') {
                //         $('#editStatus').val('1');
                //     } else {
                //         $('#editStatus').val('0');
                //     }
                     
                  let html = '';
            if (data.image) {
                let images = [];

                // If data.image is a JSON string, decode it
                if (typeof data.image === 'string') {
                    try {
                        images = JSON.parse(data.image);
                    } catch (e) {
                        images = [data.image]; // Fallback for old records
                    }
                } else if (Array.isArray(data.image)) {
                    images = data.image;
                }

               images.forEach(img => {
                html += `
                    <div class="position-relative d-inline-block me-2 mb-2" style="display:inline-block;">
                        <img src="/event/${img}" width="80" height="80"
                            class="border rounded" style="object-fit:cover;">
                        <span class="remove-image-btn position-absolute top-0 end-0 text-white bg-dark bg-opacity-75 px-1 rounded"
                            data-img="${img}" title="Remove"
                            style="cursor:pointer; font-size:14px; line-height:1;">×</span>
                    </div>`;
            });
            }

            $('#currentImage').html(html || '<p class="text-muted">No images available.</p>');

                $('#editEventModal').modal('show');
            },
            error: function () {
                  toastr.error('Error in Slider updated!');
            }
        });
    });


  $('#editeventForm').submit(function (e) {
        e.preventDefault();
        let id = $('#editId').val();
        let formData = new FormData(this);    
           formData.append("removed_images", JSON.stringify(removedImages));    

        $.ajax({
                 url: "{{ route('events.update', ':id') }}".replace(':id', id),
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            success: function (response) {
                 table.ajax.reload(null, false);
                $('#editEventModal').modal('hide');
                 toastr.success('Slider updated successfully!');
            },
            error: function (xhr) {
                let msg = xhr.responseJSON?.message || 'Update failed.';
                alert(msg);
            }
        });
    });
});


// 🗑️ Click tiny × to delete image immediately
// $(document).on('click', '.remove-image-btn', function () {
//     const imgName = $(this).data('img');
//     const container = $(this).closest('div');
//     const id = $('#editId').val();

//     $.ajax({
//         url: "{{ route('events.removeImage', ':id') }}".replace(':id', id),
//         type: 'DELETE',
//         data: {
//             image: imgName,
//             _token: '{{ csrf_token() }}'
//         },
//         success: function () {
//             container.remove(); 
//         },
//         error: function () {
//              toastr.success('Failed to delete image!');
//         }
//     });
// });
let removedImages = [];


// 🗑️ Soft remove image on preview only
$(document).on('click', '.remove-image-btn', function () {

    const imgName = $(this).data('img');

    // Store the removed image names
    removedImages.push(imgName);

    // Remove preview from UI only
    $(this).closest('div').remove();
});


    </script>
    @endsection