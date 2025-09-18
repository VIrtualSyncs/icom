@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Icon</h4>

            <form action="{{ route('kebutuhan.store') }}" method="POST" enctype="multipart/form-data">
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

                {{-- Icon --}}
                <div class="form-group">
                    <label for="image">Icon</label>
                    <input type="file" class="form-control" id="icon" name="icon" accept="image/*">
                    <small class="form-text text-muted">
                        Enter the CSS class (e.g. "mdi mdi-home") or the icon filename.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('kebutuhan.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
