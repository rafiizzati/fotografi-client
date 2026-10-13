<?php

namespace Database\Seeders;

use App\Models\Alamat;
use App\Models\DetailPesanan;
use App\Models\Keranjang;
use App\Models\Mitra;
use App\Models\Pembayaran;
use App\Models\PenarikanSaldo;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Rekening;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Data transaksi demo. Harus dijalankan SETELAH KatalogSeeder
 * (butuh user, mitra, dan produk).
 */
class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('email', 'customer@fotografi.test')->firstOrFail();
        $mitra = Mitra::where('nama_mitra', 'Studio Satu')->firstOrFail();
        $kamera = Produk::where('mitra_id', $mitra->mitra_id)->where('nama_produk', 'Sony A7 III')->firstOrFail();

        Alamat::updateOrCreate(
            ['user_id' => $customer->user_id, 'label' => 'Rumah'],
            ['alamat_lengkap' => 'Jl. Melati No. 5', 'kota' => 'Blitar', 'provinsi' => 'Jawa Timur', 'kode_pos' => '66111'],
        );

        $rekening = Rekening::updateOrCreate(
            ['mitra_id' => $mitra->mitra_id, 'nama_bank' => 'BCA'],
            ['nomor_rekening' => '1234567890', 'nama_pemilik' => 'Pemilik Studio Satu'],
        );

        Keranjang::updateOrCreate(
            ['user_id' => $customer->user_id, 'produk_id' => $kamera->produk_id],
            ['jumlah' => 1, 'tanggal_sewa' => now()->addDays(10)->toDateString(), 'jam_sewa' => '09:00:00'],
        );

        // Pesanan selesai (lengkap dengan pembayaran dan ulasan)
        $biayaAdmin = 5000;
        $pesanan = Pesanan::updateOrCreate(
            ['user_id' => $customer->user_id, 'mitra_id' => $mitra->mitra_id, 'catatan' => 'Seeder: pesanan selesai'],
            [
                'tanggal_pesanan' => now()->subDays(5)->toDateString(),
                'tanggal_sewa' => now()->subDays(3)->toDateString(),
                'jam_sewa' => '09:00:00',
                'total_harga' => $kamera->harga,
                'biaya_admin' => $biayaAdmin,
                'status_pesanan' => 'selesai',
                'metode_pengambilan' => 'ambil_di_tempat',
            ],
        );

        DetailPesanan::updateOrCreate(
            ['pesanan_id' => $pesanan->pesanan_id, 'produk_id' => $kamera->produk_id],
            ['jumlah' => 1, 'harga_satuan' => $kamera->harga, 'subtotal' => $kamera->harga],
        );

        Pembayaran::updateOrCreate(
            ['pesanan_id' => $pesanan->pesanan_id],
            [
                'metode_pembayaran' => 'qris',
                'qr_reference_id' => 'SEED-QR-001',
                'jumlah_bayar' => $kamera->harga + $biayaAdmin,
                'status_pembayaran' => 'berhasil',
                'waktu_bayar' => now()->subDays(5),
            ],
        );

        Ulasan::updateOrCreate(
            ['pesanan_id' => $pesanan->pesanan_id, 'user_id' => $customer->user_id, 'produk_id' => $kamera->produk_id],
            ['rating' => 5, 'komentar' => 'Kamera bagus, proses mudah.', 'tanggal_ulasan' => now()->subDay()->toDateString()],
        );

        // Pesanan baru menunggu pembayaran
        Pesanan::updateOrCreate(
            ['user_id' => $customer->user_id, 'mitra_id' => $mitra->mitra_id, 'catatan' => 'Seeder: menunggu pembayaran'],
            [
                'tanggal_pesanan' => now()->toDateString(),
                'tanggal_sewa' => now()->addDays(10)->toDateString(),
                'jam_sewa' => '09:00:00',
                'total_harga' => $kamera->harga,
                'biaya_admin' => $biayaAdmin,
                'status_pesanan' => 'menunggu_pembayaran',
            ],
        );

        PenarikanSaldo::updateOrCreate(
            ['mitra_id' => $mitra->mitra_id, 'rekening_id' => $rekening->rekening_id, 'jumlah' => 200000],
            ['status' => 'pending', 'tanggal_penarikan' => now()],
        );
    }
}