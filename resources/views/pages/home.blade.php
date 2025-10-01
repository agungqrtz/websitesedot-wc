@extends('layouts.app')

@section('title', 'Jasa Sedot WC Profesional di Malang')

@section('content')

{{-- Bagian ini yang diubah --}}
<section class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('img/bgwc.png') }}'); background-size: cover; background-position: center;">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="p-4 hero-text-box">
            <h1 class="display-4 fw-bold">Jasa Sedot WC Profesional</h1>
        </div>
        <p class="lead mt-3 fw-light">
            Solusi terbaik untuk WC penuh dan saluran mampet! Sedot WC cepat, aman, dan profesional untuk menjaga kebersihan dan kesehatan lingkungan Anda.
        </p>
        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20jasa%20sedot%20WC%20Anda." class="btn btn-success btn-lg mt-3">
            <i class="fab fa-whatsapp"></i> Hubungi Kami Sekarang
        </a>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Layanan Kami</h2>
            <p class="text-muted">Kami menyediakan berbagai solusi untuk masalah sanitasi Anda.</p>
        </div>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="icon-circle bg-success text-white mb-3">
                            <i class="fas fa-toilet fa-2x"></i>
                        </div>
                        <h5 class="card-title fw-bold">Sedot WC Penuh</h5>
                        <p class="card-text">Layanan penyedotan tinja untuk perumahan, perkantoran, dan fasilitas umum dengan armada modern.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="icon-circle bg-success text-white mb-3">
                            <i class="fas fa-water fa-2x"></i>
                        </div>
                        <h5 class="card-title fw-bold">Pelancaran Saluran Mampet</h5>
                        <p class="card-text">Mengatasi masalah saluran air, wastafel, atau got yang tersumbat tanpa bongkar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                 <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="icon-circle bg-success text-white mb-3">
                            <i class="fas fa-industry fa-2x"></i>
                        </div>
                        <h5 class="card-title fw-bold">Sedot Limbah Industri</h5>
                        <p class="card-text">Jasa penyedotan limbah industri dan pabrik (non-B3) dengan penanganan profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Memilih Kami?</h2>
            <p class="text-muted">Keunggulan layanan yang kami tawarkan untuk Anda.</p>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Tim Profesional & Berpengalaman</strong></p>
            </div>
            <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Respon Cepat 24 Jam Non-Stop</strong></p>
            </div>
            <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Harga Jujur dan Transparan</strong></p>
            </div>
             <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Peralatan Modern dan Canggih</strong></p>
            </div>
             <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Jangkauan Layanan Luas</strong></p>
            </div>
             <div class="col-md-6 mb-3">
                <p><i class="fas fa-check-circle text-success me-2"></i> <strong>Garansi Pekerjaan Tuntas</strong></p>
            </div>
        </div>
    </div>
</section>

@endsection