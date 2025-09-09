@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Highlight</h4>
            <p class="card-description">Form untuk mengedit highlight</p>

            <form action="{{ route('highlights.update', $highlight) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Judul Highlight</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $highlight->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Highlight</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $highlight->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Gambar Highlight</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($highlight->image)
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" class="img-fluid mt-2" style="max-width: 200px;">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('highlights.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
