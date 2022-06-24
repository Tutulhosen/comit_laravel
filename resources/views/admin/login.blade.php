
@extends('admin.layouts.app')
@section('main-content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{url('admin/assets/img/logo-white.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        @include('validate.validate');
                        <!-- Form -->
                        <form action="{{ route('admin.login.system') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="email" class="form-control" value="{{old('email')}}" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        <br>
                        OR
                        <br>
                        <a class=" btn btn-success" href="{{route('admin.reg')}}">create a new account</a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection



