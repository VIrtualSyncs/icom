@extends('template.master');

@section('content');



<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
              </div>
            </div>
            <div class="row">
    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card" style="min-height:250px">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <h3 class="mb-2 fs-2">Total Units</h3>
                <h3 class="text-muted font-weight-normal fs-1">{{ $totalUnits ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card" style="min-height:250px">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <h3 class="mb-2 fs-2">Available</h3>
                <h3 class="text-muted font-weight-normal fs-1">{{ $tersediaUnits ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card" style="min-height:250px">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <h3 class="mb-2 fs-2">Pending</h3>
                <h3 class="text-muted font-weight-normal fs-1">{{ $bookingUnits ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
        <div class="card" style="min-height:250px">
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <h3 class="mb-2 fs-2">Sold</h3>
                <h3 class="text-muted font-weight-normal fs-1">{{ $terjualUnits ?? 0 }}</h3>
            </div>
        </div>
    </div>
</div>


@endsection