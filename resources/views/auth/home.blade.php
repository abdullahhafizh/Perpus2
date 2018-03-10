@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">Home Admin</div>

                <div class="card-body">
                    <div class="card-deck">
                        <div class="row justify-content-center">
                            <div class="col-md-4 form-group">
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title">Halaman User</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Management User</h6>
                                        <p class="card-text">Tambah, Edit, dan Hapus User.</p>
                                        <a href="{{ url('admin/user') }}" class="btn btn-primary btn-block">Pergi ke Halaman User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="card border-secondary">
                                    <div class="card-body">
                                        <h5 class="card-title">Halaman Buku</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Management Daftar Buku</h6>
                                        <p class="card-text">Tambah, Edit, dan Hapus Buku.</p>
                                        <a href="{{ url('admin/buku') }}" class="btn btn-primary btn-block">Pergi ke Halaman Buku</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="card border-success">
                                    <div class="card-body">
                                        <h5 class="card-title">Halaman Stok</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Management Stok Buku</h6>
                                        <p class="card-text">Tambah, Edit, dan Hapus Stok.</p>
                                        <a href="{{ url('admin/stok') }}" class="btn btn-primary btn-block">Pergi ke Halaman Stok</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="card border-info">
                                    <div class="card-body">
                                        <h5 class="card-title">Halaman Peminjaman</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Management Peminjaman Buku</h6>
                                        <p class="card-text">Kembalikan Buku.</p>
                                        <a href="{{ url('admin/peminjaman') }}" class="btn btn-primary btn-block">Pergi ke Halaman Peminjaman</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="card border-warning">
                                    <div class="card-body">
                                        <h5 class="card-title">Halaman Pengembalian</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Management Pengembalian Buku</h6>
                                        <p class="card-text">Hapus Pengembalian.</p>
                                        <a href="{{ url('admin/pengembalian') }}" class="btn btn-primary btn-block">Pergi ke Halaman Pengembalian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection