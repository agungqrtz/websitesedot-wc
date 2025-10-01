@extends('layouts.app')

@section('title', 'Edit Pesanan #' . $booking->id)

@section('content')
<div class="bg-light py-5">
    <div class="container">
        <div class="col-xl-8 mx-auto bg-white p-4 p-md-5 rounded-3 shadow-lg">
            
            <h2 class="h3 fw-bold text-center text-dark mb-2">Edit Informasi Pemesanan</h2>
            <p class="text-center text-muted mb-5">Perbarui data di bawah ini sesuai kebutuhan.</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Oops! Ada beberapa kesalahan.</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.update', $booking) }}" method="POST">
                @csrf
                @method('PUT') {{-- Penting untuk form update --}}
                
                <div class="row g-4">
                    {{-- Informasi Pemesan --}}
                    <div class="col-md-6">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $booking->nama_lengkap) }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_whatsapp" class="form-label fw-semibold">Nomor Telepon WhatsApp</label>
                        <input type="number" id="nomor_whatsapp" name="nomor_whatsapp" value="{{ old('nomor_whatsapp', $booking->nomor_whatsapp) }}" class="form-control form-control-lg" required>
                    </div>
                    {{-- ... (Isi field lainnya dengan cara yang sama, menggunakan value dari $booking) --}}
                    <div class="col-md-12">
                        <label for="alamat_lengkap" class="form-label fw-semibold">Alamat Lengkap Penyedotan</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3" class="form-control form-control-lg" required>{{ old('alamat_lengkap', $booking->alamat_lengkap) }}</textarea>
                    </div>

                    <hr class="my-4">

                    {{-- Detail Layanan --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Jenis Bangunan</label>
                        <div>
                            <input type="radio" name="jenis_bangunan" value="Rumah" {{ old('jenis_bangunan', $booking->jenis_bangunan) == 'Rumah' ? 'checked' : '' }} required> Rumah
                            {{-- ... Tambahkan radio button lainnya --}}
                        </div>
                    </div>
                     <div class="col-md-12">
                        <label class="form-label fw-semibold">Jenis yang Dibutuhkan</label>
                        <div>
                            <input type="checkbox" name="jenis_layanan[]" value="Sedot WC Penuh" {{ in_array('Sedot WC Penuh', old('jenis_layanan', $booking->jenis_layanan)) ? 'checked' : '' }}> Sedot WC Penuh
                            {{-- ... Tambahkan checkbox lainnya --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_pelayanan" class="form-label fw-semibold">Tanggal Pelayanan</label>
                        <input type="date" id="tanggal_pelayanan" name="tanggal_pelayanan" value="{{ old('tanggal_pelayanan', $booking->tanggal_pelayanan) }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <div>
                           <input type="radio" name="metode_pembayaran" value="Tunai di Tempat" {{ old('metode_pembayaran', $booking->metode_pembayaran) == 'Tunai di Tempat' ? 'checked' : '' }} required> Tunai di Tempat
                           {{-- ... Tambahkan radio button lainnya --}}
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-warning btn-lg fw-bold w-100 py-3">
                        Update Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection