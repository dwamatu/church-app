@extends('common.master-fullscreen')

@push('styles')



@section('login-content')




        <div class="login-box">
            <div class="login-logo">
                <a href="/"><b>CHURCH DIGITAL</b>&nbsp;PORTAL</a>
            </div>

            <!-- /.login-logo -->
            <div class="login-box-body">
                @include('flash')

                @yield('auth-content')

            </div>
        </div>




@endsection