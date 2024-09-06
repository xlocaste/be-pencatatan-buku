<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Http\Resources\BukuResource;
use App\Http\Controllers\Controller;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->get();

        // $result = $bukuItem->map(function ($item) {
        //     $kategori = Kategori::find($item->produk_id);
        //     return [
        //         'produk_id' => $item->produk_id,
        //         'nama_produk' => $kategori->nama,
        //         'quantity' => $item->quantity,
        //         'kategori' => $produk->kategori,
        //     ];
        // });

        return BukuResource::collection($bukus);
    }

    public function store(StoreBukuRequest $request)
    {
        $bukus = Buku::create([
            'nama'      => $request->nama,
            'kategori_id'      => $request->kategori_id,
            'author'  => $request->author,
            'tanggal_rilis'  => $request->tanggal_rilis,
            'publisher'  => $request->publisher,
        ]);

        //return response
        return response()->json([
            'message' => 'Buku berhasil ditambahkan!',
        ]);
    }

    public function show($id)
    {
        $bukus = Buku::findOrFail($id);

        return new BukuResource($bukus, [
            'status' => true,
            'message' => 'Data Buku Ditemukan!'
        ]);
    }

    public function update(UpdateBukuRequest $request, Buku $buku)
    {
            $buku->update([
                'nama'      => $request->nama,
                'kategori_id'      => $request->kategori_id,
                'author'      => $request->author,
                'tanggal_rilis'      => $request->tanggal_rilis,
                'publisher'      => $request->publisher,
            ]);

        //return response
        return response()->json([
            'message' => 'Kategori berhasil diedit!',
        ]);
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus!',
        ]);
    }
}
