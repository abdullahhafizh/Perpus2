@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">Buku</div>

                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ url('admin/buku/create') }}" style="color: inherit;text-decoration: none;"><button type="button" class="btn btn-success btn-lg btn-block">Input Buku</button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
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
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->kode_buku }}</td>
                                    <td>{{ $book->judul_buku }}</td>
                                    <td>{{ $book->pengarang }}</td>
                                    <td>{{ $book->kategori }}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".up{{ $book->id }}">Edit</button>
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
<div class="modal fade up{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $book->judul_buku }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/buku/'.$book->id.'/update') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">                        
                        <label for="kode_buku" class="col-form-label">{{ __('Kode Buku') }}</label>

                        <input id="kode_buku" type="text" class="form-control{{ $errors->has('kode_buku') ? ' is-invalid' : '' }}" name="kode_buku" value="{{ $book->kode_buku }}" required>


                        @if ($errors->has('kode_buku'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('kode_buku') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="judul_buku" class="col-form-label">{{ __('Judul Buku') }}</label>

                        <input id="judul_buku" type="text" class="form-control{{ $errors->has('judul_buku') ? ' is-invalid' : '' }}" name="judul_buku" value="{{ $book->judul_buku }}" required>


                        @if ($errors->has('judul_buku'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('judul_buku') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="pengarang" class="col-form-label">{{ __('Pengarang') }}</label>

                        <input id="pengarang" type="text" class="form-control{{ $errors->has('pengarang') ? ' is-invalid' : '' }}" name="pengarang" value="{{ $book->pengarang }}" required>


                        @if ($errors->has('pengarang'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('pengarang') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">                        
                        <label for="kategori" class="col-form-label">{{ __('Kategori') }}</label>

                        <input id="kategori" type="text" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" name="kategori" value="{{ $book->kategori }}" required>


                        @if ($errors->has('kategori'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('kategori') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>                
                </div>
            </form>            
        </div>
    </div>
</div>
<div class="modal fade {{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buku yang akan dihapus tidak dapat dikembalikan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin Ingin menghapus {{ $book->judul_buku }}?
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
