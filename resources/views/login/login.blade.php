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
              <a href="#" class="noble-ui-logo d-block mb-2">BEBAN<span>KU</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

              @if(session('success'))
              <p class="alert alert-success">{{ session('success') }}</p>
              @endif
              @if($errors->any())
              @foreach($errors->all() as $err)
              <p class="alert alert-danger">{{ $err }}</p>
              @endforeach
              @endif

              <form class="forms-sample" action="login/action" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" name="username" class="form-control" id="userE mail" placeholder="Email">
                  </div>
                  <!-- @if($errors->has('username'))
                  <div class="text-danger">
                    {{ $errors->first('username')}}
                  </div>
                  @endif -->
                </div>

                <div class="form-group">
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                  </div>
                  <!-- @if($errors->has('password'))
                  <div class="text-danger">
                    {{ $errors->first('password')}}
                  </div>
                  @endif -->
                </div>

                <div>
                  <button class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                </div>
                <a href="{{ route('password.request') }}" class="d-block mt-3 text-muted">Lupa Password Anda?</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection