@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-4 d-flex flex-column">
        <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
            <div class="card bg-primary card-rounded">
              <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Category</h4>
                <div class="row">
                  <div class="col-sm-4">
                    {{-- <p class="status-summary-ight-white mb-1"></p> --}}
                    <h2 class="text-info">{{ $category }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-lg-4 d-flex flex-column">
        <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
            <div class="card bg-primary card-rounded">
              <div class="card-body pb-0">
                <h4 class="card-title card-title-dash text-white mb-4">Clients</h4>
                <div class="row">
                  <div class="col-sm-4">
                    {{-- <p class="status-summary-ight-white mb-1"></p> --}}
                    <h2 class="text-info">{{ $client }}</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('admin.client')}}">
                    <div class="card">
                            <div class="card-img-overlay " >
                                <i class="fa fa-address-card" style="font-size:200px;color:#867979;"></i><h3 class="card-title text-dark">Clients Quotation</h3>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
     --}}
</div>
@endsection
