@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Header + tombol Add --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">House Types Management</h4>
                <a href="{{ route('house-types.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Add House Type
                </a>
            </div>

            {{-- Tabel data --}}
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Top View</th>
                            <th>Back View</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Land Area</th>
                            <th>Building Area</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Price</th>
                            <th>Installment Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($houses as $house)
                            <tr>
                                <td>{{ $houses->firstItem() + $loop->index }}</td>
                                <td>
                                    @if($house->image)
                                        <img src="{{ asset('storage/' . $house->image) }}"
                                             alt="{{ $house->name }}"
                                             class="img-fluid"
                                             style="max-width: 80px; max-height: 60px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($house->top_view)
                                        <img src="{{ asset('storage/' . $house->top_view) }}"
                                             alt="{{ $house->name }} - Top View"
                                             class="img-fluid"
                                             style="max-width: 80px; max-height: 60px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($house->back_view)
                                        <img src="{{ asset('storage/' . $house->back_view) }}"
                                             alt="{{ $house->name }} - Back View"
                                             class="img-fluid"
                                             style="max-width: 80px; max-height: 60px;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $house->name }}</td>
                                <td>{{ Str::limit($house->description, 50) }}</td>
                                <td>{{ $house->land_area }}</td>
                                <td>{{ $house->building_area }}</td>
                                <td>{{ $house->bedrooms }}</td>
                                <td>{{ $house->bathrooms }}</td>
                                <td>{{ number_format($house->price, 0, ',', '.') }}</td>
                                <td>{{ $house->installment_note }}</td>
                                <td>
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('house-types.show', $house) }}" class="btn btn-sm btn-info">
                                        <i class="mdi mdi-eye"></i> Details
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('house-types.edit', $house) }}" class="btn btn-sm btn-warning">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </a>

                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('house-types.destroy', $house) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this house type?')">
                                            <i class="mdi mdi-delete"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="13" class="text-center">No house types found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            {{ $houses->links() }}
        </div>
    </div>
</div>
@endsection
