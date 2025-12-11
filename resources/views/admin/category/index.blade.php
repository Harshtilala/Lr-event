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
            <h1 class="h3 mb-0">Categories</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itemModal">Create category</button>
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
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                                    placeholder="Enter Description" rows="3" required></textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                    required>
                            </div> --}}
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- ---------E D I T Modal --}}

        <!-- Edit Button -->
        <!-- Modal for Editing category -->
        <div class="modal fade" id="editcategoryModal" tabindex="-1" aria-labelledby="editcategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editcategoryModal">Edit category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editSliderId" name="id">
                        <div class="modal-body">
                            <input type="hidden" id="editcategoryId" name="id">
                            <div class="mb-3">
                                <label for="editDisplayOrder" class="form-label">Display Order</label>
                                <input type="number" class="form-control" id="editDisplayOrder" name="display_order"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="editTitle" name="title" required>
                            </div>

                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editDescription" name="description"
                                    required></textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="editImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="editImage" name="image" accept="image/*">
                                <div id="currentImage" class="mt-2"></div>
                            </div> --}}
                        </div>
                        <div id="errorMessages" class="text-danger"></div>
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
                            <th>Slug</th>
                            <th>Description</th>
                            {{-- <th>image</th> --}}
                            <th>Action</th>
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
                url: "{{ route('categories') }}",                
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '60px' },
                { data: 'display_order',       name: 'display_order' },
                { data: 'title',      name: 'title' },
                { data: 'slug',      name: 'slug' },
                { data: 'description',      name: 'description' },
                // { data: 'image',      name: 'image' },  
                  
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
                url: `/admin/categories/${id}`,
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

$(document).ready(function () {
    $(document).on('click', '.editBtn', function () {
        const id = $(this).data('id');       
        $.ajax({
           url: "{{ route('categories.edit', ':id') }}".replace(':id', id),
            method: 'GET',
            success: function (data) {
                $('#editSliderId').val(data.id);
                $('#editTitle').val(data.title);
                $('#editDisplayOrder').val(data.display_order);
                $('#editDescription').val(data.description);
                // $('#editImage').val(data.image);
                // if (data.image) {
                //     $('#currentImage').html(`<img src="/category/${data.image}" width="100" />`);
                // } else {
                //     $('#currentImage').html('');
                // }
                // $('#currentImage').html(data.image ? `<img src="/category/${data.image}" width="100" />` : 'No image');
               
                $('#editcategoryModal').modal('show');
            },
            error: function () {
                alert('Failed to fetch data.');
            }
        });
    });

    // Handle form submission for update
//     $('#editCategoryForm').on('submit', function (e) {
//         e.preventDefault();
//         const id = $('#editSliderId').val();
//         const formData = new FormData(this);

//         $.ajax({
//           url: "{{ route('categories.update', ':id') }}".replace(':id', id),
//             type: 'POST',
//             data: formData,
//             contentType: false,
//             processData: false,
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 table.ajax.reload(null, false);
//                 $('#editCategoryModal').modal('hide');                
//                 alert(response.message || 'Category updated successfully.');
//             },
//             error: function (xhr) {
//                 let errors = xhr.responseJSON?.errors;
//                 let msg = 'Failed to update category.';
//                 if (errors) {
//                     msg = Object.values(errors).flat().join('<br>');
//                     $('#errorMessages').html(msg);
//                 } else {
//                     alert(xhr.responseJSON?.message || msg);
//                 }
//             }
//         });
//     });
// });
  $('#editCategoryForm').submit(function (e) {
        e.preventDefault();
        let id = $('#editSliderId').val();
        let formData = new FormData(this);        

        $.ajax({
            url: `/admin/categories/update/${id}`,
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            success: function (response) {
                 table.ajax.reload(null, false);
                $('#editcategoryModal').modal('hide');
                alert('Category updated successfully.');
            },
            error: function (xhr) {
                let msg = xhr.responseJSON?.message || 'Update failed.';
                alert(msg);
            }
        });
    });
});
    </script>
    @endsection