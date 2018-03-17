@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="card border-light">
        <div class="card-header">Pengembalian</div>

        <div class="card-body">                    
            <div class="table-responsive">
                <table id="example" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>  
                    <tbody>
                        @foreach($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->id }}</td>
                            <td>{{ $borrow->nama_peminjam }}</td>
                            <td>{{ $borrow->alamat_peminjam }}</td>
                            <td>{{ $borrow->judul_buku }}</td>
                            <td>{{ $borrow->tanggal_pinjam }}</td>
                            <td>{{ $borrow->tanggal_kembali }}</td>
                            <td>{{ $borrow->denda }}</td>
                            <td>
                                <div class="text-center">
                                    <!-- <a href="{{ url('admin/pengembalian/'.$borrow->id.'/destroy') }}" class="btn btn-sm btn-danger">Hapus</a> -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="{{ $borrow->id }}" data-nama="{{ $borrow->nama_peminjam }}">Hapus</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <a href="">LINK</a>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot-content')
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var nama = button.data('nama') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + nama)
  modal.find('.modal-body input').val(id)
  
})
</script>
@endsection

@include('akin.dtScript')
