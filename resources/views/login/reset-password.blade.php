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
                                <h5 class="text-muted fw-normal mb-4">Lupa Password Ya?</h5>
                            </div>

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                                @endif

                                <form class="forms-sample" action="{{ route('password.update') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="token" value="{{request()->token}}">
                                    <input type="hidden" name="email" value="{{request()->email}}">

                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="userPassword" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="userPassword" placeholder="Password">
                                    </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary me-2 mb-2 mb-md-0">Request Password Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection