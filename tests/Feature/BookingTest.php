<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_login_bisa_membuat_pesanan()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Login sebagai user

        $dataPesanan = [
            'nama_lengkap' => 'Agung Test',
            'nomor_whatsapp' => '081234567890',
            'alamat_lengkap' => 'Jl. Percobaan No. 1',
            'jenis_bangunan' => 'Rumah',
            'jenis_layanan' => ['Sedot WC Penuh'],
            'tanggal_pelayanan' => '2025-12-30',
            'metode_pembayaran' => 'Tunai di Tempat',
        ];

        $response = $this->post(route('booking.store'), $dataPesanan);

        // Pastikan redirect ke WhatsApp (sesuai logika controller Anda)
        $response->assertStatus(302); 
        $this->assertDatabaseHas('bookings', [
            'nama_lengkap' => 'Agung Test',
            'user_id' => $user->id
        ]);
    }

    /** @test */
    public function user_bisa_melihat_daftar_pesanannya_di_dashboard()
    {
        $user = User::factory()->create();
        $booking = Booking::create([
            'user_id' => $user->id,
            'nama_lengkap' => 'Pesanan Saya',
            'nomor_whatsapp' => '0812345',
            'alamat_lengkap' => 'Alamat',
            'jenis_bangunan' => 'Rumah',
            'jenis_layanan' => ['Sedot WC'],
            'tanggal_pelayanan' => '2025-10-10',
            'metode_pembayaran' => 'Tunai'
        ]);

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Pesanan Saya'); // Pastikan teks ini muncul
    }

    /** @test */
    public function user_tidak_bisa_melihat_pesanan_orang_lain()
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        // Pesanan milik User A
        $bookingA = Booking::create([
            'user_id' => $userA->id,
            'nama_lengkap' => 'Pesanan A',
            'nomor_whatsapp' => '081', 'alamat_lengkap' => 'X', 'jenis_bangunan' => 'X', 'jenis_layanan' => ['X'], 'tanggal_pelayanan' => '2025-01-01', 'metode_pembayaran' => 'X'
        ]);

        // Login sebagai User B
        $this->actingAs($userB);

        // Coba akses detail pesanan A
        $response = $this->get(route('booking.show', $bookingA));

        $response->assertStatus(403); // Harus Forbidden
    }
}