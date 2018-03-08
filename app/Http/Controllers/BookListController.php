<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookList;
use App\StockOfBook;

class BookListController extends Controller
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
        $data['books'] = BookList::all();
        return view('buku.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new BookList;
        $table->kode_buku = $request->input('kode_buku');
        $table->judul_buku = $request->input('judul_buku');
        $table->pengarang = $request->input('pengarang');
        $table->kategori = $request->input('kategori');
        $table->save();

        $table2 = new StockOfBook;
        $table2->judul_buku = $request->input('judul_buku');
        $table2->save();

        return redirect(url('admin/buku'));
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
        $table = BookList::find($id);
        $table->delete();

        return redirect(url('admin/buku'));
    }
}
