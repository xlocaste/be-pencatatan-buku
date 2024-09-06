<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        return KategoriResource::collection($kategoris);
    }

    public function store(StoreKategoriRequest $request)
    {
        $kategori = Kategori::create([
            'nama'      => $request->nama,
            'deskripsi'  => $request->deskripsi,
        ]);

        // //return response
        // return response()->json([
        //     'message' => 'Kategori berhasil ditambahkan!',
        // ]);

        return (new KategoriResource($kategori))->additional([
            'message' => 'Kategori berhasil ditambahkan!',
        ]);
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return new KategoriResource($kategori, [
            'status' => true,
            'message' => 'Data Kategori Ditemukan!'
        ]);
    }

    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
            $kategori->update([
                'nama'      => $request->nama,
                'deskripsi'  => $request->deskripsi,
            ]);

        //return response
        return response()->json([
            'message' => 'Kategori berhasil diedit!',
        ]);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus!',
        ]);
    }
}
