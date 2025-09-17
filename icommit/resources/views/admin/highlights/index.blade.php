@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Manage highlights</h4>
                <a href="{{ route('highlights.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> add Highlights
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>description</th>
                            <th>date created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($highlights as $highlight)
                        <tr>
                            <td>{{ $highlights->firstItem() + $loop->index }}</td>
                            <td>
                                @if($highlight->image)
                                    <img src="{{ asset('storage/' . $highlight->image) }}" alt="{{ $highlight->title }}" class="img-fluid" style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $highlight->title }}</td>
                            <td>{{ Str::limit($highlight->description, 50) }}</td>
                            <td>{{ $highlight->created_at ? $highlight->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('highlights.show', $highlight) }}" class="btn btn-sm btn-info">Details</a>
                                <a href="{{ route('highlights.edit', $highlight) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('highlights.destroy', $highlight) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this highlight?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">There are no highlights yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $highlights->links() }}
        </div>
    </div>
</div>
@endsection
