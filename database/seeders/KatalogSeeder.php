<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Fasilitas;
use App\Models\JadwalProduk;
use App\Models\Kategori;
use App\Models\Mitra;
use App\Models\Portofolio;
use App\Models\Produk;
use App\Models\SyaratKetentuan;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Data dasar: user, mitra, kategori, produk, fasilitas, jadwal.
 * Idempoten: updateOrCreate dengan natural key.
 */
class KatalogSeeder extends Seeder
{
    public function run(): void
    {
        // --- Users (password: "password") ---
        $users = [
            ['admin@fotografi.test', 'Admin Fotografi', 'admin'],
            ['mitra1@fotografi.test', 'Pemilik Studio Satu', 'mitra'],
            ['mitra2@fotografi.test', 'Pemilik Studio Dua', 'mitra'],
            ['customer@fotografi.test', 'Customer Demo', 'customer'],
        ];
        foreach ($users as $i => [$email, $nama, $role]) {
            User::updateOrCreate(
                ['email' => $email],
                [
                    'nama_lengkap' => $nama,
                    'no_telepon' => '08123456780'.$i,
                    'password' => 'password',
                    'role' => $role,
                    'email_verified_at' => now(),
                ],
            );
        }

        // --- Kategori ---
        $kategori = [];
        foreach ([['Kamera', 'camera', 'sewa'], ['Lensa', 'aperture', 'sewa'], ['Jasa Foto', 'user', 'jasa']] as [$nama, $icon, $tipe]) {
            $kategori[$nama] = Kategori::updateOrCreate(
                ['nama_kategori' => $nama],
                ['icon' => $icon, 'tipe' => $tipe],
            );
        }

        // --- Mitra ---
        $mitra = [];
        foreach ([
            ['Studio Satu', 'Rental kamera dan jasa foto.', 'Jl. Merdeka No. 1, Blitar'],
            ['Studio Dua', 'Spesialis foto prewedding.', 'Jl. Anggrek No. 2, Malang'],
        ] as [$nama, $desc, $alamat]) {
            $mitra[$nama] = Mitra::updateOrCreate(
                ['nama_mitra' => $nama],
                ['deskripsi' => $desc, 'alamat' => $alamat, 'jam_operasional' => '08:00 - 20:00'],
            );
        }

        Portofolio::updateOrCreate(
            ['mitra_id' => $mitra['Studio Satu']->mitra_id, 'judul' => 'Wisuda 2026'],
            ['foto_url' => 'portofolio/wisuda.jpg', 'deskripsi' => 'Sesi foto wisuda.'],
        );

        SyaratKetentuan::updateOrCreate(
            ['mitra_id' => $mitra['Studio Satu']->mitra_id, 'isi_syarat' => 'Wajib menyerahkan KTP sebagai jaminan.'],
            ['urutan' => 1],
        );

        // --- Produk ---
        $produk = [
            ['Studio Satu', 'Kamera', 'Sony A7 III', 350000, 'per_hari', false],
            ['Studio Satu', 'Lensa', 'Lensa 50mm f/1.8', 100000, 'per_hari', false],
            ['Studio Satu', 'Jasa Foto', 'Paket Wisuda', 750000, 'per_sesi', true],
            ['Studio Dua', 'Jasa Foto', 'Paket Prewedding', 2500000, 'per_paket', true],
        ];
        $produkModel = [];
        foreach ($produk as [$m, $k, $nama, $harga, $satuan, $isPaket]) {
            $produkModel[$nama] = Produk::updateOrCreate(
                ['mitra_id' => $mitra[$m]->mitra_id, 'nama_produk' => $nama],
                [
                    'kategori_id' => $kategori[$k]->kategori_id,
                    'deskripsi' => "Produk {$nama}",
                    'harga' => $harga,
                    'satuan_harga' => $satuan,
                    'stok' => 1,
                    'is_paket' => $isPaket,
                ],
            );
        }

        // Paket Wisuda berisi Sony A7 III + lensa (tabel paket_details)
        $paket = $produkModel['Paket Wisuda'];
        $paket->produkDalamPaket()->syncWithoutDetaching([
            $produkModel['Sony A7 III']->produk_id => ['jumlah' => 1],
            $produkModel['Lensa 50mm f/1.8']->produk_id => ['jumlah' => 1],
        ]);

        // --- Fasilitas & jadwal ---
        foreach ($produkModel as $p) {
            Fasilitas::updateOrCreate(
                ['produk_id' => $p->produk_id, 'nama_fasilitas' => 'Baterai cadangan'],
                ['tipe' => 'include'],
            );
            JadwalProduk::updateOrCreate(
                ['produk_id' => $p->produk_id, 'tanggal' => '2026-12-01', 'jam_mulai' => '09:00:00'],
                ['jam_selesai' => '12:00:00', 'status' => 'tersedia'],
            );
        }

        Banner::updateOrCreate(
            ['judul' => 'Promo Sewa Kamera'],
            ['gambar' => 'banners/promo.jpg', 'urutan' => 1, 'is_active' => true],
        );
    }
}
