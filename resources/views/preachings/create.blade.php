@extends('common.master')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}">
@endpush

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

            <div class="matter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="aggregator-create-content">
                                <form class="creation-form" role="form" method="POST" action="{{ url('/api/v1/preachings') }}" enctype="multipart/form-data">
                                    {!! csrf_field() !!}



                                        <div class="form-group row first">
                                            <label class="col-sm-4 form-control-label text-right">Title</label>

                                            <div class="col-sm-6">
                                                <input name="title" type="file" class="form-control" id="title" value="{{ old('title') }}">

                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('title') }}</strong>
                  </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 form-control-label text-right">Preached On</label>

                                            <div class="col-sm-6">
                                                <input name="preached_on" type="date" class="form-control" id="preached_on" value="{{ old('preached_on') }}">

                                                @if ($errors->has('preached_on'))
                                                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('preached_on') }}</strong>
                  </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 form-control-label text-right">Preached By</label>

                                            <div class="col-sm-6">
                                                <input name="preached_by" type="text" class="form-control" id="preached_by" value="{{ old('preached_by') }}">

                                                @if ($errors->has('preached_by'))
                                                    <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('preached_by') }}</strong>
                  </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group row push-up-20">
                                            <div class="col-sm-6 col-sm-offset-4">
                                                <button id="save-details" type="submit" class="btn btn-primary btn-lg">Save Preaching</button>
                                            </div>
                                        </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.content -->
        </div>


    </div>
@endsection
@push('scripts')
@endpush