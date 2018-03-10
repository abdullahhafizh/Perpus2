<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookList;
use App\Borrowing;
use App\StockOfBook;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = BookList::all();
        return view('home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['borrows'] = Borrowing::where('status_peminjaman', '=', '0')->get();
        return view('peminjaman.index')->with($data);
    }

    public function upgrade()
    {
        $data['borrows'] = Borrowing::where('status_peminjaman', '=', '1')->get();
        return view('pengembalian.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Borrowing;
        $table->nama_peminjam = $request->input('nama_peminjam');
        $table->alamat_peminjam = $request->input('alamat_peminjam');
        $table->judul_buku = $request->input('judul_buku');
        $table->tanggal_pinjam = $request->input('tanggal_pinjam');
        $table->save();

        $id = StockOfBook::where('judul_buku', '=', $request->input('judul_buku'))->value('id');
        $jumlah = StockOfBook::where('judul_buku', '=', $request->input('judul_buku'))->value('jumlah_buku');

        $table2 = StockOfBook::find($id);
        $table2->jumlah_buku = $jumlah - 1;
        $table2->save();

        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Borrowing::find($id);
        $table->tanggal_kembali = date('Y-m-d');
        $table->status_peminjaman = 1;
        $created = new Carbon($table->tanggal_pinjam);
        $now = new Carbon(date('Y-m-d'));
        $difference = ($created->diffInWeeks($now) < 1) ? 1 : $created->diffInWeeks($now);        
        if ($difference>1) {
            $table->denda = $difference * 10000;
        }
        else
        {
            $table->denda = 0;
        }
        $table->save();

        $id = StockOfBook::where('judul_buku', '=', $table->judul_buku)->value('id');
        $jumlah = StockOfBook::where('judul_buku', '=', $table->judul_buku)->value('jumlah_buku');

        $table2 = StockOfBook::find($id);
        $table2->jumlah_buku = $jumlah + 1;
        $table2->save();

        return redirect(url('admin/peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Borrowing::find($id);
        $table->delete();

        return redirect(url('admin/pengembalian'));
    }
}
