@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hero details</h4>
            <div class="row">
                <div class="col-md-4">
                    @if($hero->gambar)
                        <img src="{{ asset('storage/' . $hero ->gambar) }}" alt="{{ $hero->nama }}" class="img-fluid">
                    @else
                        <div class="text-center text-muted">Tidak ada gambar</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5>{{ $hero->nama }}</h5>
                    <p>{{ $hero->deskripsi_hero }}</p>
                    <p><strong>Date created :</strong> {{ $hero->created_at ? $hero->created_at->format('d M Y H:i') : '-' }}</p>
                    <p><strong>Last updated :</strong> {{ $hero->updated_at ? $hero->updated_at->format('d M Y H:i') : '-' }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('heroes.edit', $hero) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
