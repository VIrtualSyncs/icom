@extends('template.master')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Tambah Unit Rumah</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('viewdata') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Unit Rumah</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('units.store') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tipe">Tipe Rumah</label>
                  <input type="text" class="form-control @error('tipe') is-invalid @enderror"
                         id="tipe" name="tipe" value="{{ old('tipe') }}" required>
                  @error('tipe')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control @error('status') is-invalid @enderror"
                          id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booking" {{ old('status') == 'booking' ? 'selected' : '' }}>Booking</option>
                    <option value="terjual" {{ old('status') == 'terjual' ? 'selected' : '' }}>Terjual</option>
                  </select>
                  @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="luas_tanah">Luas Tanah</label>
                  <input type="text" class="form-control @error('luas_tanah') is-invalid @enderror"
                         id="luas_tanah" name="luas_tanah" value="{{ old('luas_tanah') }}" required>
                  @error('luas_tanah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="luas_bangunan">Luas Bangunan</label>
                  <input type="text" class="form-control @error('luas_bangunan') is-invalid @enderror"
                         id="luas_bangunan" name="luas_bangunan" value="{{ old('luas_bangunan') }}" required>
                  @error('luas_bangunan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kamar_tidur">Kamar Tidur</label>
                  <input type="text" class="form-control @error('kamar_tidur') is-invalid @enderror"
                         id="kamar_tidur" name="kamar_tidur" value="{{ old('kamar_tidur') }}" required>
                  @error('kamar_tidur')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="kamar_mandi">Kamar Mandi</label>
                  <input type="text" class="form-control @error('kamar_mandi') is-invalid @enderror"
                         id="kamar_mandi" name="kamar_mandi" value="{{ old('kamar_mandi') }}" required>
                  @error('kamar_mandi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a href="{{ route('units.index') }}" class="btn btn-light">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
