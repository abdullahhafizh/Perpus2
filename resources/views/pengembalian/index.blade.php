@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Buku</div>

                <div class="card-body">                    
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
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
                                    <td>
                                        <div class="text-center">
                                                <a href="{{ url('admin/pengembalian/'.$borrow->id.'/destroy') }}" class="btn btn-sm btn-danger">Hapus</a>                                            
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
@endsection
@include('akin.dtScript')
