@extends('common.master')
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {!! $pageData['page_title'] !!}
                    <small>panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">{!! $pageData['page_title'] !!}</li>
                </ol>
            </section>


            <!-- /.content -->
        </div>


    </div>
@endsection