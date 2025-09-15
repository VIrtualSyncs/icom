@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">facilities management</h4>
                <a href="{{ route('facilities.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add Facility
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
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
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus facility ini?')">Delete</button>
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
