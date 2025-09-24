@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">House Type Details</h4>
                <div>
                    <a href="{{ route('house-types.edit', $houseType) }}" class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('house-types.index') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> Back to List
                    </a>
                    <form action="{{ route('house-types.destroy', $houseType) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this house type?')">
                            <i class="mdi mdi-delete"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Name:</strong></label>
                        <p>{{ $houseType->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Slug:</strong></label>
                        <p>{{ $houseType->slug }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><strong>Description:</strong></label>
                        <p>{{ $houseType->description ?: 'No description' }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><strong>Image:</strong></label>
                        <br>
                        @if($houseType->image)
                            <img src="{{ asset('storage/' . $houseType->image) }}" alt="{{ $houseType->name }}" class="img-fluid" style="max-width: 300px;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><strong>Top View:</strong></label>
                        <br>
                        @if($houseType->top_view)
                            <img src="{{ asset('storage/' . $houseType->top_view) }}" alt="{{ $houseType->name }} - Top View" class="img-fluid" style="max-width: 300px;">
                        @else
                            <span class="text-muted">No top view image</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><strong>Back View:</strong></label>
                        <br>
                        @if($houseType->back_view)
                            <img src="{{ asset('storage/' . $houseType->back_view) }}" alt="{{ $houseType->name }} - Back View" class="img-fluid" style="max-width: 300px;">
                        @else
                            <span class="text-muted">No back view image</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><strong>Land Area (m²):</strong></label>
                        <p>{{ $houseType->land_area }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><strong>Building Area (m²):</strong></label>
                        <p>{{ $houseType->building_area }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><strong>Bedrooms:</strong></label>
                        <p>{{ $houseType->bedrooms }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><strong>Bathrooms:</strong></label>
                        <p>{{ $houseType->bathrooms }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Price:</strong></label>
                        <p>Rp {{ number_format($houseType->price, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Installment Note:</strong></label>
                        <p>{{ $houseType->installment_note ?: 'No installment note' }}</p>
                    </div>
                </div>
            </div>

            @if($houseType->facilities && count($houseType->facilities) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><strong>Facilities:</strong></label>
                        <ul class="list-group">
                            @foreach($houseType->facilities as $facility)
                            <li class="list-group-item">{{ $facility }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
