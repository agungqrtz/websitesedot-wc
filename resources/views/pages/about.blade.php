@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

{{-- Menambahkan sedikit CSS kustom untuk efek tumpang tindih --}}
<style>
    .profile-card-container {
        position: relative;
        margin-top: 2rem;
    }
    .profile-card-image {
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 80%;
        margin-left: auto;
    }
    .profile-card {
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 90%;
        z-index: 10;
    }
    @media (max-width: 992px) {
        .profile-card {
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: -50px;
        }
    }
</style>

<div class="container my-5 py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="profile-card-container">
                <img src="https://via.placeholder.com/600x400.png?text=Foto+Armada+Kami" alt="Armada Sedot WC Lancar Jaya" class="profile-card-image">

                <div class="card shadow-lg profile-card border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="Wisnu Aji Dwi Cahyo">
                            <div>
                                <h5 class="card-title fw-bold mb-0">Wisnu Aji Dwi Cahyo</h5>
                                <p class="card-text text-muted mb-0">Pemilik</p>
                            </div>
                            <div class="ms-auto">
                                <a href="#" class="text-secondary me-2"><i class="fas fa-phone-alt"></i></a>
                                <a href="#" class="text-secondary"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <p class="card-text text-muted">
                            Sedot WC Lancar Jaya merupakan solusi terbaik dan terpercaya untuk mengatasi berbagai permasalahan saluran pembuangan dan saluran air di Kabupaten Tulungagung dan sekitarnya. Dengan mengutamakan kebersihan, ketepatan waktu, serta pelayanan yang ramah dan profesional, kami siap membantu Anda menjaga kebersihan lingkungan dan kenyamanan hunian.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ps-lg-5">
            <div class="p-4 rounded-3" style="border: 1px solid #e0e0e0;">
                <h2 class="h4 fw-bold mb-3">Pertolongan terbaik bagi anda</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-primary fa-lg me-3"></i>
                        <span>Tim kami Profesional dan Berpengalaman</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-primary fa-lg me-3"></i>
                        <span>Cepat dan Efisien membersihkan</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-primary fa-lg me-3"></i>
                        <span>Kepuasan anda dijamin 100%</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-primary fa-lg me-3"></i>
                        <span>Sudah dipercaya lebih dari 20 tahun</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection