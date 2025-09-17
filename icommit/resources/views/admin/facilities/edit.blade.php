@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Facility</h4>

            <form action="{{ route('facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Title</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $facility->nama) }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Description</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $facility->deskripsi) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    @if($facility->gambar)
                        <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $facility->gambar) }}" alt="{{ $facility->nama }}" class="img-fluid" style="max-width: 200px;">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
