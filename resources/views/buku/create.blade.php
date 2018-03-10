@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-light">
                <div class="card-header">{{ __('Form Input Buku') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/buku/create') }}">
                        @csrf                        

                        <div class="form-group row">
                            <label for="kode_buku" class="col-md-4 col-form-label text-md-right">{{ __('Kode Buku') }}</label>

                            <div class="col-md-6">
                                <input id="kode_buku" type="text" class="form-control{{ $errors->has('kode_buku') ? ' is-invalid' : '' }}" name="kode_buku" value="{{ old('kode_buku') }}" required>

                                @if ($errors->has('kode_buku'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('kode_buku') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul_buku" class="col-md-4 col-form-label text-md-right">{{ __('Judul Buku') }}</label>

                            <div class="col-md-6">
                                <input id="judul_buku" type="text" class="form-control{{ $errors->has('judul_buku') ? ' is-invalid' : '' }}" name="judul_buku" value="{{ old('judul_buku') }}" required>

                                @if ($errors->has('judul_buku'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('judul_buku') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pengarang" class="col-md-4 col-form-label text-md-right">{{ __('Pengarang') }}</label>

                            <div class="col-md-6">
                                <input id="pengarang" type="text" class="form-control{{ $errors->has('pengarang') ? ' is-invalid' : '' }}" name="pengarang" value="{{ old('pengarang') }}" required>

                                @if ($errors->has('pengarang'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('pengarang') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control{{ $errors->has('kategori') ? ' is-invalid' : '' }}" name="kategori" value="{{ old('kategori') }}" required>

                                @if ($errors->has('kategori'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('kategori') }}</strong>
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
