@extends('common.master')
@push('styles')
<link rel="stylesheet" href="{{ URL::asset('css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/custom-datatables.css') }}">
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

            <div class="content">
                <div class="padd invoice">
                    <div class="row taller-10" style="margin-bottom: 10px">
                        <div class="col-md-12">
                            <a class="btn btn-primary" type="button">Add Event</a>
                        </div>
                    </div>
                    <div class="row">
                        <table id="events-grid" class="table table-bordered table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Venue</th>
                                <th>Time To</th>
                                <th>Time From</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Venue</th>
                                <th>Time To</th>
                                <th>Time From</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>


    </div>
@endsection
@push('scripts')
<script src="{{ URL::asset('js/datatables.min.js') }}"></script>
<script src="{{url::to('/vendor/datatables/buttons.server-side.js')}}"></script>
<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script type="text/javascript">

    (function () {

        var url = "/fetch/events";

        $('#events-grid').dataTable({
            dom: "<'row table-controls'<'col-sm-3 col-md-3 page-length'l><'col-sm-6 col-md-6 search'f><'col-sm-3 col-md-3 text-right'>><'row'<'col-md-12'tr>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
            language: {"search": "", "loadingRecords": "Please wait, loading data ..."},
            serverSide: false,
            destroy: true,
            processing: true,
            ordering: false,
            ajax: url,
            columns: [

                {data: 'ename'},
                {data: 'evenue'},
                {data: 'tfrom'},
                {data: 'tto'},
                {data: 'des'},
                {data: 'time'},
                {data: null}

            ]
//            ,
//            columnDefs: [
//                {
//                    "render": function (data, type, row) {
//
//                        return "<a href='/voucher/partner/details/" + row.voucher_partner_id + "'>" + row.voucher_partner + "</a>";
//                    },
//                    "targets": 1
//                },
//                {
//                    render: function (data, type, row) {
//                        data = row.season_start;
//                        if (data != null) {
//                            return (moment(data).format('lll'));
//
//                        }
//                        else {
//                            return "<span class='text-missing'>Date not Set</span>";
//                        }
//                    },
//                    "targets": 3
//                },
//                {
//                    render: function (data, type, row) {
//                        data = row.season_end;
//                        if (data != null) {
//                            return (moment(data).format('lll'));
//
//                        }
//                        else {
//                            return "<span class='text-missing'>Date not Set</span>";
//                        }
//                    },
//                    "targets": 4
//                },
//                {
//                    render: function (data, type, row) {
//                        data = row.created_at;
//                        if (data != null) {
//                            return (moment(data).format('lll'));
//
//                        }
//                        else {
//                            return "<span class='text-missing'>Date not Set</span>";
//                        }
//                    },
//                    "targets": 7
//                }
//            ],
            // order: [[11, "desc"]]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search ...');

    })();

</script>
@endpush