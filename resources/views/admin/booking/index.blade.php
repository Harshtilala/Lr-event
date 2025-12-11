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

        <div class="card">
            <div class="card-body">
                <table id="users-table" class="table table-striped table-bordered align-middle" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Contact No</th>
                            <th>Event Name</th>
                            <th>Price</th>
                          
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
                url: "{{ route('booking') }}",                
                type: 'GET'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: '60px' },
                { data: 'name',      name: 'name' },
                { data: 'email',name: 'email' },
                { data: 'contact',name: 'contact' },
                { data: 'event_id',      name: 'event_id' },              
                { data: 'price',      name: 'price' },               
             
            ],
            language: {
                processing: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
            }
        });
});
</script>
@endsection