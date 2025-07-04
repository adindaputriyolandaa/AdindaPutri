<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Barang::all();

        return view('barang.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.form', [
            'item' => new Barang(),
            'action' => route('barang.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Barang::create([
        'nama' => $request->input('nama'),
        'barcode' => $request->input('barcode'),
        'satuan' => $request->input('satuan'),
        'version' => 1, // ⬅ isi langsung
    ]);

    return redirect(route('barang.index'));
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Barang::findOrFail($id);

        return view('barang.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Barang::findOrFail($id);

        return view('barang.form', [
            'item' => $item,
            'action' => route('barang.update', $item->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $barang = Barang::findOrFail($id);

    $barang->update([
        'nama' => $request->input('nama'),
        'barcode' => $request->input('barcode'),
        'satuan' => $request->input('satuan'),
        'version' => $barang->version + 1, // ⬅ tambah versi tiap kali edit
    ]);

    return redirect(route('barang.index'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}