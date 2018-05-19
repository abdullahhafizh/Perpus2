@section('head-content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap4.min.css">
<style type="text/css">
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
</style>
@endsection

@section('foot-content')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-sm" type="text" placeholder="Cari '+title+'" />' );
    } );

    // DataTable    
    var table = $('table').DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "Tidak ada data yang tersedia pada tabel ini",
            "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered":   "(disaring dari _MAX_ entri keseluruhan)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Tampilkan _MENU_ entri",
            "loadingRecords": "Loading...",
            "processing":     "Sedang memproses...",
            "search":         "Cari:",
            "zeroRecords":    "Tidak ditemukan data yang sesuai",
            "paginate": {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            "aria": {
                "sortAscending":  ": aktifkan untuk mengurutkan kolom ascending",
                "sortDescending": ": aktifkan untuk mengurutkan kolom descending"
            }
        },     
        lengthChange: true,        
        buttons: [
            {
                extend: 'copy',
                text: 'Salin',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'excel',
                text: 'Export Excel',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: 'Cetak',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'colvis',
                text: 'Visibilitas Kolom',
            },
        ]
    } );

    table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                .search( this.value )
                .draw();
            }
        } );
    } );
} );
</script>
@endsection