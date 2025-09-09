@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Highlight</h4>
            <p class="card-description">Informasi lengkap tentang highlight</p>

            <div class="row">
                <div class="col-md-4">
                    @if($highlight->image)
                        <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" class="img-fluid">
                    @else
                        <div class="text-center text-muted">Tidak ada gambar</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5>{{ $highlight->title }}</h5>
                    <p>{{ $highlight->description }}</p>
                    <p><strong>Tanggal Dibuat:</strong> {{ $highlight->created_at ? $highlight->created_at->format('d M Y H:i') : '-' }}</p>
                    <p><strong>Terakhir Diupdate:</strong> {{ $highlight->updated_at ? $highlight->updated_at->format('d M Y H:i') : '-' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('highlights.edit', $highlight) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('highlights.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
