@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Manage Denah</h4>
                <!-- <a href="{{ route('denah.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Denah
                </a> -->
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($denah as $item)
                        <tr>
                            <td>{{ $denah->firstItem() + $loop->index }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid" style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->description, 50) }}</td>
                            <td>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('denah.show', $item) }}" class="btn btn-sm btn-info">Details</a>
                                <a href="{{ route('denah.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('denah.destroy', $item) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this denah?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">There are no denah yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $denah->links() }}
        </div>
    </div>
</div>
@endsection
