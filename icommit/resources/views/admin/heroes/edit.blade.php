@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Hero</h4>
            <p class="card-description">Form untuk mengedit hero</p>

            <form action="{{ route('heroes.update', $hero) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Hero</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $hero->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_hero">Deskripsi Hero</label>
                    <textarea class="form-control" id="deskripsi_hero" name="deskripsi_hero" rows="4" required>{{ $hero->deskripsi_hero }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Hero</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    @if($hero->gambar)
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        <img src="{{ asset('storage/' . $hero->gambar) }}" alt="{{ $hero->nama }}" class="img-fluid mt-2" style="max-width: 200px;">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('heroes.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
