@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">Peminjaman</div>

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
                                    <td>                                        
                                        <div class="text-center">
                                            @if(\Carbon\Carbon::createFromTimeStamp(strtotime($borrow->tanggal_pinjam))->diffInWeeks() > 0)
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".{{ $borrow->id }}">Kembalikan</button>
                                            @else
                                            <a href="{{ url('admin/peminjaman/'.$borrow->id.'/store') }}" class="btn btn-sm btn-warning">Kembalikan</a>
                                            @endif
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
@foreach($borrows as $borrow)
<div class="modal fade {{ $borrow->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Denda Rp{{ \Carbon\Carbon::createFromTimeStamp(strtotime($borrow->tanggal_pinjam))->diffInWeeks() * 10000 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Telat mengembalikan {{ \Carbon\Carbon::createFromTimeStamp(strtotime($borrow->tanggal_pinjam))->diffInWeeks() }} minggu.<br>
                Terkena denda sebesar <b>Rp{{ \Carbon\Carbon::createFromTimeStamp(strtotime($borrow->tanggal_pinjam))->diffInWeeks() * 10000 }}</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <a href="{{ url('admin/peminjaman/'.$borrow->id.'/store') }}" class="btn btn-success">Bayar</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@include('akin.dtScript')
