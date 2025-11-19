<?php

namespace App\Http\Controllers;

use App\Models\Booking; // Import model Booking
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Menampilkan halaman form pemesanan.
     */
    public function create()
    {
        return view('pages.booking');
    }

    /**
     * Memproses data dari form pemesanan dan redirect ke WhatsApp.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|min:1|max:255', // Updated validation rule
            'nomor_whatsapp' => 'required|numeric|digits_between:10,15', // Updated validation rule
            'email' => 'nullable|email',
            'alamat_lengkap' => 'required|string|min:1|max:255', // Updated validation rule
            'jenis_bangunan' => 'required|string',
            'jenis_bangunan_lainnya' => 'nullable|string|max:100',
            'jenis_layanan' => 'required|array|min:1',
            'jenis_layanan.*' => 'string',
            'tanggal_pelayanan' => 'required|date|after_or_equal:today', // Updated validation rule
            'metode_pembayaran' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // 2. Simpan Pesanan ke Database
        $dataToSave = $validated;
        if (Auth::check()) {
            // Jika user login, kaitkan pesanan dengan ID user
            $dataToSave['user_id'] = Auth::id();
        }

        Booking::create($dataToSave);

        // 3. Format Pesan untuk WhatsApp
        $layanan = implode(', ', $validated['jenis_layanan']);
        $jenisBangunan = $validated['jenis_bangunan'];
        if ($jenisBangunan === 'Lainnya' && !empty($validated['jenis_bangunan_lainnya'])) {
            $jenisBangunan = 'Lainnya (' . $validated['jenis_bangunan_lainnya'] . ')';
        }

        $pesan = "🔔 *PESANAN BARU SEDOT WC* 🔔\n\n";
        $pesan .= "*Nama Lengkap:*\n" . $validated['nama_lengkap'] . "\n\n";
        $pesan .= "*Nomor WhatsApp:*\n" . $validated['nomor_whatsapp'] . "\n\n";
        $pesan .= "*Alamat Lengkap:*\n" . $validated['alamat_lengkap'] . "\n\n";
        $pesan .= "*Jenis Bangunan:*\n" . $jenisBangunan . "\n\n";
        $pesan .= "*Jenis Layanan:*\n" . $layanan . "\n\n";
        $pesan .= "*Tanggal Pelayanan:*\n" . date('d F Y', strtotime($validated['tanggal_pelayanan'])) . "\n\n";
        $pesan .= "*Metode Pembayaran:*\n" . $validated['metode_pembayaran'] . "\n\n";
        $pesan .= "Mohon segera ditindaklanjuti. Terima kasih.";

        // 4. Buat URL WhatsApp
        $nomorAdmin = '6281234567890'; // Ganti dengan nomor Anda
        $encodedPesan = urlencode($pesan);
        $whatsappUrl = "https://wa.me/{$nomorAdmin}?text={$encodedPesan}";

        // 5. Redirect Pengguna ke WhatsApp
        return Redirect::away($whatsappUrl);
    }

    /**
     * Menampilkan detail satu pesanan.
     */
    public function show(Booking $booking)
    {
        // Pastikan hanya user yang bersangkutan yang bisa melihat detail pesanannya
        if (Auth::id() !== $booking->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.booking-detail', compact('booking'));
    }

    /**
     * Menampilkan form untuk mengedit pesanan.
     */
    public function edit(Booking $booking)
    {
        // Pastikan user hanya bisa mengedit pesanannya sendiri
        if (Auth::id() !== $booking->user_id) {
            abort(403);
        }

        return view('pages.booking-edit', compact('booking'));
    }

    /**
     * Memperbarui pesanan di database.
     */
    public function update(Request $request, Booking $booking)
    {
        // Pastikan user hanya bisa mengupdate pesanannya sendiri
        if (Auth::id() !== $booking->user_id) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|min:3|max:255', // Updated validation rule
            'nomor_whatsapp' => 'required|numeric|digits_between:10,15', // Updated validation rule
            'email' => 'nullable|email',
            'alamat_lengkap' => 'required|string|min:3|max:255', // Updated validation rule
            'jenis_bangunan' => 'required|string',
            'jenis_bangunan_lainnya' => 'nullable|string|max:100',
            'jenis_layanan' => 'required|array|min:1',
            'tanggal_pelayanan' => 'required|date|after_or_equal:today', // Updated validation rule
            'metode_pembayaran' => 'required|string',
        ]);

        $booking->update($validated);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil diperbarui!');
    }

    /**
     * Menghapus pesanan dari database.
     */
    public function destroy(Booking $booking)
    {
        // Pastikan user hanya bisa menghapus pesanannya sendiri
        if (Auth::id() !== $booking->user_id) {
            abort(403);
        }

        $booking->delete();

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dihapus.');
    }
}

