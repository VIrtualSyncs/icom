@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Hero Baru</h4>
            <p class="card-description">Form untuk menambahkan hero baru</p>

            <form action="{{ route('heroes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Hero</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_hero">Deskripsi Hero</label>
                    <textarea class="form-control" id="deskripsi_hero" name="deskripsi_hero" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Hero</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('heroes.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
