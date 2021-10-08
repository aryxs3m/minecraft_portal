@push('head')
    <link href="/assets/styles/crud.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.css"/>
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#crudTable').DataTable();
        } );
    </script>
@endpush
