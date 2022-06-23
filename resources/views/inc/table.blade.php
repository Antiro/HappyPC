{{--Tables--}}
<script src="{{ asset('addAdmin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('addAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
        $('#table1').DataTable({
            "paging": true,
            // "lengthChange": false,
            // "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[0,'desc']],
        });
    });
    $(function () {
        $('#table2').DataTable({
            // "paging": true,
            // "lengthChange": false,
            // "searching": false,
            // "ordering": true,
            // "info": true,
            "autoWidth": true,
            "responsive": true,
            "order": [[0,'desc']],
        });
    });
</script>