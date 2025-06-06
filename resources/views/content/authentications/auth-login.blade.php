@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <div class="card p-2">
        <div class="card-body mt-2">
          <h4 class="mb-2">Welcome to Unlock Information System!👋</h4>
          <p class="mb-4">Please sign-in to your account and start to working!</p>

          <form id="formAuthentication" class="mb-3" action="{{Route("login")}}" method="POST">
            {{ csrf_field() }}
            <div class="form-floating form-floating-outline mb-3">
              <input type="text" class="form-control" id="email" name="username" placeholder="Enter your username" autofocus>
              <label for="email">Username</label>
            </div>
            <div class="mb-3">
              <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <label for="password">Password</label>
                  </div>
                  <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
              </div>
            </div>
          
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

        
        </div>
      </div>
    
    </div>
  </div>
</div>
@endsection
