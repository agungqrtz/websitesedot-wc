<?php

namespace Tests\Feature;

use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_bisa_membuat_pesanan_tanpa_login()
    {
        // Data pesanan (Tanpa data user/login)
        $dataPesanan = [
            'nama_lengkap' => 'Agung Guest',
            'nomor_whatsapp' => '081234567890',
            'alamat_lengkap' => 'Jl. Tanpa Login No. 1',
            'jenis_bangunan' => 'Rumah',
            'jenis_layanan' => ['Sedot WC Penuh'],
            'tanggal_pelayanan' => '2025-12-30', // Pastikan tanggal sesuai validasi (future date)
            'metode_pembayaran' => 'Tunai di Tempat',
        ];

        // Kirim request POST langsung ke route store TANPA actingAs()
        $response = $this->post(route('booking.store'), $dataPesanan);

        // 1. Assert Status: Pastikan redirect (biasanya 302 ke WhatsApp)
        $response->assertStatus(302); 

        // 2. Assert Database: Pastikan data masuk dengan user_id NULL
        $this->assertDatabaseHas('bookings', [
            'nama_lengkap' => 'Agung Guest',
            'nomor_whatsapp' => '081234567890',
            'user_id' => null // PENTING: user_id harus null karena tidak login
        ]);
    }

    /** @test */
    public function booking_gagal_jika_input_tidak_valid()
    {
        // Skenario tambahan: Mengirim form kosong untuk cek validasi
        $response = $this->post(route('booking.store'), []);

        // Harus redirect back (302) dan ada error di session
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['nama_lengkap', 'nomor_whatsapp']);
    }
}