<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::with(['mitra', 'kategori'])
            ->when($request->query('kategori_id'), fn ($q, $v) => $q->where('kategori_id', $v))
            ->when($request->query('q'), fn ($q, $v) => $q->where('nama_produk', 'like', "%{$v}%"))
            ->paginate(10);

        return ProdukResource::collection($produk);
    }

    public function show(Produk $produk)
    {
        $produk->load(['mitra', 'kategori', 'fasilitas', 'jadwals']);

        return new ProdukResource($produk);
    }
}
