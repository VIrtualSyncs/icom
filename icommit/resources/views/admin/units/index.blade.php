@extends('template.master')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Home Unit Management</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('viewdata') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Home Unit</li>
      </ol>
    </nav>
  </div>

  <!-- Statistics Cards -->
  <div class="row">
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <i class="mdi mdi-home icon-lg text-primary"></i>
            <div class="ml-3">
              <p class="mb-0">Total house</p>
              <h4>{{ $stats['total'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <i class="mdi mdi-check-circle icon-lg text-success"></i>
            <div class="ml-3">
              <p class="mb-0">Sold</p>
              <h4>{{ $stats['terjual'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <i class="mdi mdi-home-outline icon-lg text-info"></i>
            <div class="ml-3">
              <p class="mb-0">available</p>
              <h4>{{ $stats['tersedia'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <i class="mdi mdi-clock-outline icon-lg text-warning"></i>
            <div class="ml-3">
              <p class="mb-0">Pending</p>
              <h4>{{ $stats['booking'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="card-title">Daftar Unit Rumah</h4>
            <a href="{{ route('units.create') }}" class="btn btn-primary">
              <i class="mdi mdi-plus"></i> add units
            </a>
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
                  <th>Type</th>
                  <th>Luas Tanah</th>
                  <th>Luas Bangunan</th>
                  <th>Kamar Tidur</th>
                  <th>Kamar Mandi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($units as $index => $unit)
                  <tr>
                    <td>{{ $units->firstItem() + $index }}</td>
                    <td>{{ $unit->tipe }}</td>
                    <td>{{ $unit->luas_tanah }}</td>
                    <td>{{ $unit->luas_bangunan }}</td>
                    <td>{{ $unit->kamar_tidur }}</td>
                    <td>{{ $unit->kamar_mandi }}</td>
                    <td>
                      @if($unit->status == 'tersedia')
                        <span class="badge badge-info">available</span>
                      @elseif($unit->status == 'booking')
                        <span class="badge badge-warning">Booking</span>
                      @elseif($unit->status == 'terjual')
                        <span class="badge badge-success">Sold</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('units.show', $unit) }}" class="btn btn-sm btn-info">
                        <i class="mdi mdi-eye"></i>
                      </a>
                      <a href="{{ route('units.edit', $unit) }}" class="btn btn-sm btn-warning">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                      <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus unit ini?')">
                          <i class="mdi mdi-delete"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center">Belum ada data unit rumah</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{ $units->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
