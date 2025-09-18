@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Needs Management</h4>
                <a href="{{ route('kebutuhan.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Need
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kebutuhan as $item)
<tr>
    <td>{{ $kebutuhan->firstItem() + $loop->index }}</td>

    <td>
        @if($item->icon)
            <img src="{{ asset('storage/' . $item->icon) }}"
                 alt="{{ $item->title }}"
                 class="img-fluid"
                 style="max-width: 60px; max-height: 60px;">
        @else
            <span class="text-muted">No icon</span>
        @endif
    </td>

    <td>{{ $item->title }}</td>
    <td>{{ Str::limit($item->description, 50) }}</td>
    <td>{{ $item->created_at ? $item->created_at->format('M d, Y') : '-' }}</td>

    <td>
        <a href="{{ route('kebutuhan.show', $item) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('kebutuhan.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

        <form action="{{ route('kebutuhan.destroy', $item) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Are you sure you want to delete this item?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center">No needs have been added yet</td>
</tr>
@endforelse

{{ $kebutuhan->links() }}

        </div>
    </div>
</div>
@endsection
