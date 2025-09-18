@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Icon Detail</h4>

            <div class="mb-4">
                <strong>Title:</strong>
                <p class="mb-2">{{ $kebutuhan->title }}</p>
            </div>

            <div class="mb-4">
                <strong>Description:</strong>
                <p class="mb-2">{{ $kebutuhan->description }}</p>
            </div>

            <div class="mb-4">
                <strong>Icon:</strong>
                <p class="mb-2">
                    @if($kebutuhan->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($kebutuhan->icon))
                        <img src="{{ asset('storage/' . $kebutuhan->icon) }}" alt="{{ $kebutuhan->title }}" class="img-fluid" style="max-width: 100px;">
                    @else
                        <i class="{{ $kebutuhan->icon }} mr-2"></i>
                        <code>{{ $kebutuhan->icon }}</code>
                    @endif
                </p>
            </div>

            <div class="mb-4">
                <strong>Created At:</strong>
                <p class="mb-2">{{ $kebutuhan->created_at->format('d M Y H:i') }}</p>
            </div>

            <div class="mb-4">
                <strong>Updated At:</strong>
                <p class="mb-2">{{ $kebutuhan->updated_at->format('d M Y H:i') }}</p>
            </div>

            <a href="{{ route('kebutuhan.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('kebutuhan.edit', $kebutuhan) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
