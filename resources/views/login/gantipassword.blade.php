@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url ('https://via.placeholder.com/219x452')">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">BEBAN<span>KU</span></a>
              <h5 class="text-muted fw-normal mb-4">Buat akun</h5>
              <form class="forms-sample" action="{{ route('register.action') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="Name" placeholder="Name">
                  </div>
                  @if($errors->has('name'))
                  <div class="text-danger">
                    {{ $errors->first('name')}}
                  </div>
                  @endif
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                  </div>
                  @if($errors->has('username'))
                  <div class="text-danger">
                    {{ $errors->first('username')}}
                  </div>
                  @endif
                </div>

                <!-- <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="userEmail" placeholder="Email">
                </div> -->

                <div class="form-group">
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                  </div>
                  @if($errors->has('password'))
                  <div class="text-danger">
                    {{ $errors->first('password')}}
                  </div>
                  @endif
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirm" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                  </div>
                  @if($errors->has('password_confirm'))
                  <div class="text-danger">
                    {{ $errors->first('password_confirm')}}
                  </div>
                  @endif
                </div>

                <!-- <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div> -->

                <div>
                  <button class="btn btn-primary me-2 mb-2 mb-md-0">Sign up</button>
                </div>
                <a href="{{ url('/login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection