@extends('template.master')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Detail Unit Rumah</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('viewdata') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Unit Rumah</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
      </ol>
    </nav>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="card-title">Informasi Unit Rumah</h4>
            <div>
              <a href="{{ route('units.edit', $unit) }}" class="btn btn-warning mr-2">
                <i class="mdi mdi-pencil"></i> Edit
              </a>
              <a href="{{ route('units.index') }}" class="btn btn-secondary">
                <i class="mdi mdi-arrow-left"></i> Kembali
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Tipe Rumah:</strong></label>
                <p>{{ $unit->tipe }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Status:</strong></label>
                <p>
                  @if($unit->status == 'tersedia')
                    <span class="badge badge-info">Tersedia</span>
                  @elseif($unit->status == 'booking')
                    <span class="badge badge-warning">Booking</span>
                  @elseif($unit->status == 'terjual')
                    <span class="badge badge-success">Terjual</span>
                  @endif
                </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Luas Tanah:</strong></label>
                <p>{{ $unit->luas_tanah }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Luas Bangunan:</strong></label>
                <p>{{ $unit->luas_bangunan }}</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Kamar Tidur:</strong></label>
                <p>{{ $unit->kamar_tidur }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Kamar Mandi:</strong></label>
                <p>{{ $unit->kamar_mandi }}</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Dibuat:</strong></label>
                <p>{{ $unit->created_at->format('d M Y H:i') }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><strong>Diupdate:</strong></label>
                <p>{{ $unit->updated_at->format('d M Y H:i') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
