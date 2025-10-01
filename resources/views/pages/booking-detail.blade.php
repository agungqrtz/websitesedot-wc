@extends('layouts.app')

@section('title', 'Detail Pesanan #' . $booking->id)

@section('content')
<div class="container py-5">
    <div class="col-lg-10 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 fw-bold">Detail Pesanan #{{ $booking->id }}</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-light py-3">
                <h5 class="mb-0">Dipesan pada: {{ $booking->created_at->format('d F Y, H:i') }}</h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Informasi Pemesan</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Nama:</strong> {{ $booking->nama_lengkap }}</li>
                            <li class="mb-2"><strong>No. WhatsApp:</strong> {{ $booking->nomor_whatsapp }}</li>
                            <li class="mb-2"><strong>Email:</strong> {{ $booking->email ?? '-' }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Detail Layanan</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Tanggal Pelayanan:</strong> {{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d F Y') }}</li>
                            <li class="mb-2"><strong>Layanan Dipesan:</strong> {{ implode(', ', $booking->jenis_layanan) }}</li>
                            <li class="mb-2"><strong>Metode Pembayaran:</strong> {{ $booking->metode_pembayaran }}</li>
                        </ul>
                    </div>
                    <div class="col-12 mt-3">
                        <h5 class="fw-bold mb-3">Alamat Pelayanan</h5>
                        <p class="text-muted bg-light p-3 rounded">{{ $booking->alamat_lengkap }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

