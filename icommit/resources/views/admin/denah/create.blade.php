@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Denah</h4>

            <form action="{{ route('denah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
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
                    >{{ old('description') }}</textarea>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">
                        Upload an image file (jpeg, png, jpg, gif, svg).
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('denah.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
