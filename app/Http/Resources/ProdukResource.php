<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->produk_id,
            'nama' => $this->nama_produk,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'satuan_harga' => $this->satuan_harga,
            'stok' => $this->stok,
            'is_paket' => $this->is_paket,
            'foto' => $this->foto_produk,
            'mitra' => $this->whenLoaded('mitra', fn () => [
                'id' => $this->mitra->mitra_id,
                'nama' => $this->mitra->nama_mitra,
            ]),
            'kategori' => new KategoriResource($this->whenLoaded('kategori')),
            'fasilitas' => $this->whenLoaded('fasilitas', fn () => $this->fasilitas->map(fn ($f) => [
                'nama' => $f->nama_fasilitas,
                'tipe' => $f->tipe,
            ])),
            'jadwal' => $this->whenLoaded('jadwals', fn () => $this->jadwals->map(fn ($j) => [
                'id' => $j->jadwal_id,
                'tanggal' => $j->tanggal->toDateString(),
                'jam_mulai' => $j->jam_mulai,
                'jam_selesai' => $j->jam_selesai,
                'status' => $j->status,
            ])),
        ];
    }
}
