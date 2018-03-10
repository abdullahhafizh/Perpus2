<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockOfBook;
use App\BookList;

class StockOfBooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('super');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stocks'] = StockOfBook::all();
        return view('stok.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['books'] = BookList::all();
        return view('stok.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new StockOfBook;
        $table->judul_buku = $request->input('judul_buku');
        $table->nomor_rak = $request->input('nomor_rak');
        $table->jumlah_buku = $request->input('jumlah_buku');
        $table->save();

        return redirect(url('admin/stok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $table = StockOfBook::find($id);
        $jumlah = $table->jumlah_buku;        
        $table->jumlah_buku = $jumlah + $request->input('jumlah_buku');        
        $table->save();

        return redirect(url('admin/stok'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $table = StockOfBook::find($id);
        $table->nomor_rak = $request->input('nomor_rak');
        $table->jumlah_buku = $request->input('jumlah_buku');
        $table->save();

        return redirect(url('admin/stok'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
