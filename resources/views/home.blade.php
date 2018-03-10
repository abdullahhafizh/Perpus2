@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">Buku</div>

                <div class="card-body">                    
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Pinjam</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Pinjam</th>
                                </tr>
                            </tfoot>  
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->kode_buku }}</td>
                                    <td>{{ $book->judul_buku }}</td>
                                    <td>{{ $book->pengarang }}</td>
                                    <td>{{ $book->kategori }}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">                                       
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".{{ $book->id }}">Pinjam</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($books as $book)
<div class="modal fade {{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Meminjam {{ $book->judul_buku }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('create') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">                        
                        <label for="nama_peminjam" class="col-form-label">{{ __('Nama') }}</label>

                        <input id="nama_peminjam" type="text" class="form-control{{ $errors->has('nama_peminjam') ? ' is-invalid' : '' }}" name="nama_peminjam" value="{{ old('nama_peminjam') }}" required>

                        @if ($errors->has('nama_peminjam'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nama_peminjam') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="alamat_peminjam" class="col-form-label">{{ __('Alamat') }}</label>

                        <textarea id="alamat_peminjam" class="form-control{{ $errors->has('alamat_peminjam') ? ' is-invalid' : '' }}" name="alamat_peminjam" required>{{ old('alamat_peminjam') }}</textarea>

                        @if ($errors->has('alamat_peminjam'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('alamat_peminjam') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="judul_buku" class="col-form-label">{{ __('Nama Buku') }}</label>

                        <input id="judul_buku" type="text" class="form-control{{ $errors->has('judul_buku') ? ' is-invalid' : '' }}" name="judul_buku" value="{{ $book->judul_buku }}" required readonly>

                        @if ($errors->has('judul_buku'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('judul_buku') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="tanggal_pinjam" class="col-form-label">{{ __('Tanggal Pinjam') }}</label>

                        <input id="tanggal_pinjam" type="text" class="form-control{{ $errors->has('tanggal_pinjam') ? ' is-invalid' : '' }}" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required readonly>

                        @if ($errors->has('tanggal_pinjam'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('tanggal_pinjam') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Pinjam</button>                
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('head-content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap4.min.css">
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
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="form-control form-control-sm" type="text" placeholder="Cari '+title+'" />' );
    } );

    // DataTable    
    var table = $('#example').DataTable( {
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
    } );
    
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
