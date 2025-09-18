@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Denah</h4>

            <form action="{{ route('denah.update', $denah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="{{ old('title', $denah->title) }}"
                        required
                    >
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="4"
                        required
                    >{{ old('description', $denah->description) }}</textarea>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($denah->image)
                        <small class="form-text text-muted">
                            Current: <img src="{{ asset('storage/' . $denah->image) }}" alt="Current Image" class="h-16 w-auto">
                        </small>
                    @endif
                    <small class="form-text text-muted">
                        Upload new image or leave blank to keep current.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('denah.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
