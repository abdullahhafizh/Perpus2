@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Stok Buku') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/stok/create') }}">
                        @csrf                        

                        <div class="form-group row">
                            <label for="judul_buku" class="col-md-4 col-form-label text-md-right">{{ __('Nama Buku') }}</label>

                            <div class="col-md-6">
                                <input id="judul_buku" type="text" class="form-control{{ $errors->has('judul_buku') ? ' is-invalid' : '' }}" name="judul_buku" list="listbuku" value="{{ old('judul_buku') }}" required>
                                <datalist id="listbuku">
                                    @foreach($books as $book)
                                    <option>{{$book->judul_buku}}</option>
                                    @endforeach
                                </datalist>

                                @if ($errors->has('judul_buku'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('judul_buku') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_rak" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Rak') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_rak" type="number" class="form-control{{ $errors->has('nomor_rak') ? ' is-invalid' : '' }}" name="nomor_rak" value="{{ old('nomor_rak') }}" required>

                                @if ($errors->has('nomor_rak'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nomor_rak') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_buku" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Buku') }}</label>

                            <div class="col-md-6">
                                <input id="jumlah_buku" type="number" class="form-control{{ $errors->has('jumlah_buku') ? ' is-invalid' : '' }}" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>

                                @if ($errors->has('jumlah_buku'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                                <a href="{{ url('admin/buku') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
