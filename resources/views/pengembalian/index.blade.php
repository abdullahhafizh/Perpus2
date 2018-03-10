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
@endsection
@include('akin.dtScript')
