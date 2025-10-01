@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="h3 mb-4 fw-bold">Pesanan Saya</h2>

            {{-- Menampilkan pesan sukses setelah update/delete --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    @if($bookings->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID Pesanan</th>
                                    <th scope="col">Tanggal Pesan</th>
                                    <th scope="col">Tanggal Pelayanan</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <th scope="row">#{{ $booking->id }}</th>
                                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_pelayanan)->format('d M Y') }}</td>
                                    <td>{{ implode(', ', $booking->jenis_layanan) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('booking.show', $booking) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                        <a href="{{ route('booking.edit', $booking) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('booking.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $bookings->links() }}
                    </div>
                    @else
                    <div class="text-center py-5">
                        <p class="text-muted">Anda belum memiliki riwayat pesanan.</p>
                        <a href="{{ route('booking.create') }}" class="btn btn-success mt-3">Buat Pesanan Baru</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

