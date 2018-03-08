@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stok Buku</div>

                <div class="card-body">
                    <!-- <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target=".insv">Input Stok Buku</button>
                    </div> -->
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Nomor Rak</th>
                                    <th>Jumlah Buku</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Judul</th>
                                    <th>Nomor Rak</th>
                                    <th>Jumlah Buku</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>  
                            <tbody>
                                @foreach($stocks as $stock)
                                <tr>                                    
                                    <td>{{ $stock->judul_buku }}</td>
                                    <td>{{ $stock->nomor_rak }}</td>
                                    <td>{{ $stock->jumlah_buku }}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".up{{ $stock->id }}">Edit</button>
                                                <!-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".del{{ $stock->id }}">Hapus</button> -->
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

@foreach($stocks as $stock)
<!-- <div class="modal fade del{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus stok?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data stok yang dihapus tidak dapat dikembalikan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <a href="{{ url('admin/stok/'.$stock->id.'/destroy') }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade up{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $stock->judul_buku }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/stok/'.$stock->id.'/update') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">                        
                        <label for="nomor_rak" class="col-form-label">{{ __('Nomor Rak') }}</label>

                        <input id="nomor_rak" type="number" class="form-control{{ $errors->has('nomor_rak') ? ' is-invalid' : '' }}" name="nomor_rak" value="{{ $stock->nomor_rak }}" required>

                        @if ($errors->has('nomor_rak'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nomor_rak') }}</strong>
                        </span>
                        @endif
                    </div>                    
                    <div class="form-group">                        
                        <label for="jumlah_buku" class="col-form-label">{{ __('Jumlah Buku') }}</label>

                        <input id="jumlah_buku" type="number" class="form-control{{ $errors->has('jumlah_buku') ? ' is-invalid' : '' }}" name="jumlah_buku" value="{{ $stock->jumlah_buku }}" required>

                        @if ($errors->has('jumlah_buku'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('jumlah_buku') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Selesai</button>                
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@include('akin.dtScript')
