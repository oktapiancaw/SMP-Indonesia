@extends('layouts.auth')

@section('content')


<div class="row">
    <div class="col">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Let Join!</h1>
        </div>
        <form class="user" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" placeholder="Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Password Confirmation">

                </div>
            </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">Sign Up</button>
        </form>
        <hr>
        <div class="text-center">
          <a class="small" href="{{ route('login') }}">Already have an Account!</a>
        </div>
      </div>
    </div>
</div>
@endsection
