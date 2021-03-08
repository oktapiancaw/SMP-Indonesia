@extends('layouts.auth')

@section('content')

<div class="row">
    <div class="col">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="customCheck">
                <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
            </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
        </form>
        <hr>
        <div class="text-center">
          <a class="small" href="register.html">Create an Account!</a>
        </div>
      </div>
    </div>
</div>
@endsection
