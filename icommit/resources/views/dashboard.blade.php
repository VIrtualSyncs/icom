@extends('template.master');

@section('content');



<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome to Admin side</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">cek pesan masuk</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">click here</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
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