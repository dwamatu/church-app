@extends('auth.master')

@section('auth-content')

    <div class="row">
        <div class="col-sm-7">

            <p class="login-box-msg">Sign in to start your session</p>

            <form class="form-horizontal" role="form" method="POST" action="/login">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-8 ">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                    </div>
                </div>


            </form>
            <div class="row">
                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </div>
        </div>
        <div class="col-sm-5 br-l br-grey pl30">
            <h3 class="mb25"> You will Have Access To:</h3>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Preaching Recordings</p>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Events</p>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Admin Portal</p>
        </div>
    </div>
@endsection
