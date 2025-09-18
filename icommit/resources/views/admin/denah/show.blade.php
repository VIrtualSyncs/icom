@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Denah Detail</h4>

            <div class="mb-4">
                <strong>Title:</strong>
                <p class="mb-2">{{ $denah->title }}</p>
            </div>

            <div class="mb-4">
                <strong>Description:</strong>
                <p class="mb-2">{{ $denah->description }}</p>
            </div>

            <div class="mb-4">
                <strong>Image:</strong>
                <p class="mb-2">
                    @if($denah->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($denah->image))
                        <img src="{{ asset('storage/' . $denah->image) }}" alt="{{ $denah->title }}" class="img-fluid" style="max-width: 200px;">
                    @else
                        No Image
                    @endif
                </p>
            </div>

            <div class="mb-4">
                <strong>Created At:</strong>
                <p class="mb-2">{{ $denah->created_at->format('d M Y H:i') }}</p>
            </div>

            <div class="mb-4">
                <strong>Updated At:</strong>
                <p class="mb-2">{{ $denah->updated_at->format('d M Y H:i') }}</p>
            </div>
            
            <a href="{{ route('denah.edit', $denah) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
