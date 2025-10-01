@extends('layouts.app')

@section('title', 'Pemesanan Jasa Sedot WC')

@section('content')

{{-- Bagian Hero (Latar Belakang Gambar) --}}

{{-- Bagian Form Pemesanan --}}
<div id="form-pemesanan" class="bg-light py-5">
    <div class="container">
        <div class="col-xl-8 mx-auto bg-white p-4 p-md-5 rounded-3 shadow-lg">
            
            <h2 class="h3 fw-bold text-center text-dark mb-2">Informasi Pemesanan</h2>
            <p class="text-center text-muted mb-5">Lengkapi data di bawah ini untuk melakukan pemesanan.</p>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Oops! Ada beberapa kesalahan.</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    {{-- Informasi Pemesan --}}
                    <div class="col-md-6">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_whatsapp" class="form-label fw-semibold">Nomor Telepon WhatsApp</label>
                        <input type="number" id="nomor_whatsapp" name="nomor_whatsapp" value="{{ old('nomor_whatsapp') }}" class="form-control form-control-lg" placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label fw-semibold">Email (Opsional)</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-12">
                        <label for="alamat_lengkap" class="form-label fw-semibold">Alamat Lengkap Penyedotan</label>
                        <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3" class="form-control form-control-lg" required>{{ old('alamat_lengkap') }}</textarea>
                    </div>

                    <hr class="my-4">

                    {{-- Detail Layanan --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Jenis Bangunan</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check"><input type="radio" name="jenis_bangunan" value="Rumah" class="form-check-input" id="rumah" {{ old('jenis_bangunan') == 'Rumah' ? 'checked' : '' }} required><label class="form-check-label" for="rumah">Rumah</label></div>
                            <div class="form-check"><input type="radio" name="jenis_bangunan" value="Kos" class="form-check-input" id="kos" {{ old('jenis_bangunan') == 'Kos' ? 'checked' : '' }}><label class="form-check-label" for="kos">Kos</label></div>
                            <div class="form-check"><input type="radio" name="jenis_bangunan" value="Ruko" class="form-check-input" id="ruko" {{ old('jenis_bangunan') == 'Ruko' ? 'checked' : '' }}><label class="form-check-label" for="ruko">Ruko</label></div>
                            <div class="form-check"><input type="radio" name="jenis_bangunan" value="Kantor" class="form-check-input" id="kantor" {{ old('jenis_bangunan') == 'Kantor' ? 'checked' : '' }}><label class="form-check-label" for="kantor">Kantor</label></div>
                            <div class="form-check"><input type="radio" name="jenis_bangunan" value="Lainnya" class="form-check-input" id="lainnya" {{ old('jenis_bangunan') == 'Lainnya' ? 'checked' : '' }}><label class="form-check-label" for="lainnya">Lainnya</label></div>
                        </div>
                        <input type="text" name="jenis_bangunan_lainnya" class="form-control mt-2" placeholder="Sebutkan jenis bangunan lainnya...">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Jenis yang Dibutuhkan</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check"><input type="checkbox" name="jenis_layanan[]" value="Sedot WC Penuh" class="form-check-input" id="sedot" {{ in_array('Sedot WC Penuh', old('jenis_layanan', [])) ? 'checked' : '' }}><label class="form-check-label" for="sedot">Sedot WC Penuh</label></div>
                            <div class="form-check"><input type="checkbox" name="jenis_layanan[]" value="Saluran Mampet" class="form-check-input" id="mampet" {{ in_array('Saluran Mampet', old('jenis_layanan', [])) ? 'checked' : '' }}><label class="form-check-label" for="mampet">Saluran Mampet</label></div>
                            <div class="form-check"><input type="checkbox" name="jenis_layanan[]" value="Perawatan Berkala" class="form-check-input" id="perawatan" {{ in_array('Perawatan Berkala', old('jenis_layanan', [])) ? 'checked' : '' }}><label class="form-check-label" for="perawatan">Perawatan Berkala</label></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_pelayanan" class="form-label fw-semibold">Tanggal Pelayanan</label>
                        <input type="date" id="tanggal_pelayanan" name="tanggal_pelayanan" value="{{ old('tanggal_pelayanan') }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check"><input type="radio" name="metode_pembayaran" value="Tunai di Tempat" class="form-check-input" id="tunai" {{ old('metode_pembayaran') == 'Tunai di Tempat' ? 'checked' : '' }} required><label class="form-check-label" for="tunai">Tunai di Tempat</label></div>
                            <div class="form-check"><input type="radio" name="metode_pembayaran" value="Transfer Bank" class="form-check-input" id="transfer" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'checked' : '' }}><label class="form-check-label" for="transfer">Transfer Bank</label></div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold w-100 py-3">
                        Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
