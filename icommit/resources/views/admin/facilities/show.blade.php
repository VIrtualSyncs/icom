@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Detail Facility</h4>
                <div>
                    <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label><strong>Nama:</strong></label>
                        <p>{{ $facility->nama }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Deskripsi:</strong></label>
                        <p>{{ $facility->deskripsi }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Tanggal Dibuat:</strong></label>
                        <p>{{ $facility->created_at ? $facility->created_at->format('d M Y H:i') : '-' }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Terakhir Diupdate:</strong></label>
                        <p>{{ $facility->updated_at ? $facility->updated_at->format('d M Y H:i') : '-' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($facility->gambar)
                        <div class="form-group">
                            <label><strong>Gambar:</strong></label>
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $facility->gambar) }}" alt="{{ $facility->nama }}" class="img-fluid">
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label><strong>Gambar:</strong></label>
                            <p class="text-muted">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus facility ini?')">
                        <i class="mdi mdi-delete"></i> Hapus Facility
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
