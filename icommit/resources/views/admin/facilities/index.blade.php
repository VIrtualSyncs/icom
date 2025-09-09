@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Kelola Facilities</h4>
                <a href="{{ route('facilities.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Tambah Facility
                </a>
            </div>
            <p class="card-description">Daftar semua facilities yang tersedia</p>

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
                        @forelse($facilities as $facility)
                        <tr>
                            <td>{{ $facility->id }}</td>
                            <td>
                                @if($facility->gambar)
                                    <img src="{{ asset('storage/' . $facility->gambar) }}" alt="{{ $facility->nama }}" class="img-fluid" style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $facility->nama }}</td>
                            <td>{{ Str::limit($facility->deskripsi, 50) }}</td>
                            <td>{{ $facility->created_at ? $facility->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('facilities.show', $facility) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus facility ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada facility</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                 <div class="template-demo mt-2">
                <a href="{{ route('facilities.create') }}" class="btn btn-outline-primary btn-icon-text">
                <i class="mdi mdi-file-check btn-icon-prepend" ></i> Add </a>
            </div>
            </div>
            {{ $facilities->links() }}
        </div>
    </div>
</div>
@endsection
