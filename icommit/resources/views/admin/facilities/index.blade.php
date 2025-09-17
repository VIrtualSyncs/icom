@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Facilities Management</h4>
                <a href="{{ route('facilities.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Facilities
                </a>
            </div>

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
                        @forelse($facilities as $facility)
                        <tr>
                            <td>{{  $facilities->firstItem() + $loop->index }}</td>
                            <td>
                                @if($facility->gambar)
                                    <img src="{{ asset('storage/' . $facility->gambar) }}" alt="{{ $facility->nama }}" class="img-fluid" style="max-width: 80px; max-height: 60px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ $facility->nama }}</td>
                            <td>{{ Str::limit($facility->deskripsi, 50) }}</td>
                            <td>{{ $facility->created_at ? $facility->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('facilities.show', $facility) }}" class="btn btn-sm btn-info">Details</a>
                                <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this facility?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada facility</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $facilities->links() }}
        </div>
    </div>
</div>
@endsection
