@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')

{{-- CSS Kustom untuk Latar Belakang --}}
<style>
    .services-hero {
        background-color: #1a2a4c; /* Warna biru tua */
        position: relative;
        color: white;
    }
    .services-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background-color: #2a4176; /* Warna biru yang lebih terang */
        clip-path: circle(60% at 100% 50%);
        z-index: 0;
    }
    .service-card {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
</style>

<div class="services-hero py-5">
    <div class="container position-relative py-5" style="z-index: 1;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-5 fw-bold">Perawatan Dan Layanan Profesional</h1>
                <p class="lead mb-5">Layanan Sedot WC, Solusi Saluran mampet, dan pembuangan limbah yang efisien.</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 text-white text-center p-4 rounded-4 border-0">
                    <div class="card-body">
                        <div class="mb-4">
                            {{-- Ganti dengan URL ikon Anda jika ada --}}
                            <img src="https://img.icons8.com/ios-filled/100/ffffff/plumbing.png" alt="Ikon Perawatan Berkala" class="mx-auto">
                        </div>
                        <h5 class="card-title fw-bold fs-4">Perawatan Berkala</h5>
                        <p class="card-text">Membersihkan saluran air kamar mandi, wastafel atau dapur yang tersumbat.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 text-white text-center p-4 rounded-4 border-0">
                    <div class="card-body">
                        <div class="mb-4">
                             {{-- Ganti dengan URL ikon Anda jika ada --}}
                            <img src="https://img.icons8.com/ios-filled/100/ffffff/sewage-truck.png" alt="Ikon Penyedotan Septic Tank" class="mx-auto">
                        </div>
                        <h5 class="card-title fw-bold fs-4">Penyedotan Septic Tank</h5>
                        <p class="card-text">Menguras limbah dari septic tank rumah tangga, gedung, atau industri untuk mencegah meluap atau mampet.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 text-white text-center p-4 rounded-4 border-0">
                    <div class="card-body">
                        <div class="mb-4">
                             {{-- Ganti dengan URL ikon Anda jika ada --}}
                            <img src="https://img.icons8.com/ios-filled/100/ffffff/toilet-bowl.png" alt="Ikon Pelayanan WC Mampet" class="mx-auto">
                        </div>
                        <h5 class="card-title fw-bold fs-4">Pelayanan WC mampet</h5>
                        <p class="card-text">Menangani WC atau saluran yang tiba-tiba mampet dan tidak bisa digunakan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection