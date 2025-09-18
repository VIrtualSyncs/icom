@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Icon</h4>

            {{-- ganti admin.kebutuhan.update -> kebutuhan.update --}}
            <form action="{{ route('kebutuhan.update', $kebutuhan->id) }}" method="POST" enctype="multipart/form-data">
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
                        value="{{ old('title', $kebutuhan->title) }}"
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
                    >{{ old('description', $kebutuhan->description) }}</textarea>
                </div>

                {{-- Icon --}}
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
                    @if($kebutuhan->icon)
                        <small class="form-text text-muted">
                            Current: {{ $kebutuhan->icon }}
                        </small>
                    @endif
                    <small class="form-text text-muted">
                        Upload new icon image or leave blank to keep current.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

                {{-- ganti admin.kebutuhan.index -> kebutuhan.index --}}
                <a href="{{ route('kebutuhan.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
