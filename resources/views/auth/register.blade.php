@extends('auth.master')

@section('auth-content')
    <div class="row">

        <div class="section-divider mt10 mb40">
            <span>Set up your account</span>
        </div>
        <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">


                    <div class="section">
                        <input id="phonenumber" type="text" class="form-control" name="phonenumber"
                               value="{{ old('phonenumber') }}"
                               placeholder="Phone Number">

                        @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="section">
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


                    <div class="section">
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                    <div class="section">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('agree_terms') ? ' has-error' : '' }}">


                    <div class="section">

                       <div class="col-xs-8">
                           <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" id="agree_terms" name="agree_terms"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>

                        @if ($errors->has('agree_terms'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('agree_terms') }}</strong>
                                    </span>
                        @endif</div>
                    </div>
                </div>

                <div class="section">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">


            </div>
        </form>
    </div>


@endsection
