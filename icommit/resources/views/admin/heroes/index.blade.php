@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Kelola Heroes</h4>
                <a href="{{ route('heroes.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Hero
                </a>
            </div>
            <p class="card-description">Daftar semua heroes yang tersedia</p>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($heroes as $hero)
                        <tr>
                            <td>{{ $hero->id }}</td>
                            <td>
                                @if($hero->gambar)
                                    <img src="{{ asset('storage/' . $hero->gambar) }}" alt="{{ $hero->nama }}" class="img-fluid" style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $hero->nama }}</td>
                            <td>{{ Str::limit($hero->deskripsi_hero, 50) }}</td>
                            <td>{{ $hero->created_at ? $hero->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('heroes.show', $hero) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('heroes.edit', $hero) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('heroes.destroy', $hero) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus hero ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada hero</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            <div class="template-demo mt-2">
                <a href="{{ route('heroes.create') }}" class="btn btn-outline-primary btn-icon-text">
                <i class="mdi mdi-file-check btn-icon-prepend" ></i> Add </a>
            </div>
            {{ $heroes->links() }}
        </div>
    </div>
</div>
@endsection
