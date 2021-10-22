@push('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/datatables.min.css"/>
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#crudTable').DataTable({
                responsive: true
            });
        } );
    </script>
@endpush
