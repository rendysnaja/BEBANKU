@extends('layout2.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-2 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url('C:\Users\ASUS\nobleui-laravel\template\demo1\public\assets\images\screenshots\dark.jpg')">
            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <div class="d-flex justify-content-center">
                <a href="#" class="noble-ui-logo d-block mb-2">BEBAN<span>KU</span></a>
              </div>
              <div class="d-flex justify-content-center">
                <h5 class="text-muted fw-normal mb-4">Masuk sebagai</h5>
              </div>
              <div class="d-flex justify-content-center">
                <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                  @if (Auth::user()->role_id == 1)
                  <a href="/dashboard/admin">
                    <button type="button" class="btn btn-primary">
                      Admin
                    </button>
                  </a>
                  @elseif (Auth::user()->role_id == 2)
                  <a href="/dashboard/asesi">
                    <button type="button" class="btn btn-primary">
                      Asesi
                    </button>
                  </a>
                  @elseif (Auth::user()->role_id == 3)
                  <a href="/dashboard/asesor">
                    <button type="button" class="btn btn-primary">
                      Asesor
                    </button>
                  </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection