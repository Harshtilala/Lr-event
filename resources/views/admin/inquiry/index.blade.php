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
        <h1 class="h3 mb-0">Inquiry</h1>
    </div>

<!-- Modal for Editing Inquiry -->
<div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-labelledby="viewInquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewInquiryModalLabel">Inquiry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <strong>Name:</strong>
                        <p id="viewName" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p id="viewEmail" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Contact:</strong>
                        <p id="viewContact" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Event Type:</strong>
                        <p id="viewEventType" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Event Name:</strong>
                        <p id="viewEventName" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Start Date:</strong>
                        <p id="viewStartDate" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>End Date:</strong>
                        <p id="viewEndDate" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Location:</strong>
                        <p id="viewLocation" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Total Persons:</strong>
                        <p id="viewTotalPersons" class="mb-0 text-muted"></p>
                    </div>
                    <div class="col-12">
                        <strong>Message:</strong>
                        <p id="viewMessage" class="mb-0 text-muted"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    {{-- ---------END Modal --}}
<div class="card">
        <div class="card-body">
            <table id="users-table" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Contact</th>
                        <th>Event Type</th>                      
                        <th>Start Date</th>                  
                        <th>Location</th>                      
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
                url: "{{ route('inquiries') }}",                
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '60px' },
                { data: 'name',       name: 'name' },
                { data: 'email',      name: 'email' },
                { data: 'contact',      name: 'contact' },
                { data: 'event_type',      name: 'event_type' },
                { data: 'start_date',      name: 'start_date' },               
                { data: 'location',      name: 'location' },               
                { data: 'action',     name: 'action', orderable: false, searchable: false, width: '160px' },
            ],
            language: {
                processing: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
            }
        });
});
</script>
<script>
    $(document).on('click', '.viewBtn', function () {
        var id = $(this).data('id');    

        // AJAX call to get single inquiry
        $.ajax({
            url: 'inquiry/show/' + id, // Adjust route as needed
            type: 'GET',
            success: function (data) {
                // Populate modal fields
                $('#viewName').text(data.name);
                $('#viewEmail').text(data.email);
                $('#viewContact').text(data.contact);
                $('#viewEventType').text(data.event_type);
                $('#viewEventName').text(data.event_name);
                $('#viewStartDate').text(data.start_date);
                $('#viewEndDate').text(data.end_date);
                $('#viewLocation').text(data.location);
                $('#viewTotalPersons').text(data.total_person);
                $('#viewMessage').text(data.message);

                // Show the modal
                $('#viewInquiryModal').modal('show');
            },
            error: function () {
                alert('Something went wrong while fetching data.');
            }
        });
    });
</script>

@endsection 