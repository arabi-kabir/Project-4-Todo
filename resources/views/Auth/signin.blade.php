@extends('Auth.master')

@section('signin-active')
    active
@endsection

@section('content')
    <section class="container">


        <form id="sign-up-form" method="POST">
          <h1 class="text-center pb-4 mylebel2">Sign in</h1>
          @csrf
          <div class="form-group row">
            <label class="col-sm-4 col-form-label float-right text-center">Username</label>
            <div class="col-sm-8">
              <input name="username" type="text" class="form-control " placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label text-center">Password</label>
            <div class="col-sm-8">
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
          </div>


          <div class="form-group row">
            <span class="col-sm-4 col-form-label text-center"></span>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-success">Sign in</button>
            </div>
          </div>

          @include('Include.alert_message');
      </form>

    </section>
@endsection
