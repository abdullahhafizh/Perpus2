@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Buku</div>

                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ url('admin/buku/create') }}" style="color: inherit;text-decoration: none;"><button type="button" class="btn btn-success btn-lg btn-block">Input Buku</button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Option</th>
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
                                                <label class="btn btn-sm btn-primary">
                                                    <a href="{{ url('admin/user/'.$book->id.'/edit') }}" style="color: inherit;text-decoration: none;">Edit</a>
                                                </label>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".{{ $book->id }}">Hapus</button>
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
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapus {{ $book->judul_buku }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Buku yang akan dihapus tidak bisa dikembalikan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <a href="{{ url('admin/buku/'.$book->id.'/destroy') }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@include('akin.dtScript')
