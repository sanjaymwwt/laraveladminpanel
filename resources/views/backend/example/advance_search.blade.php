@extends('backend.layouts.app')
@section('title', 'Advance Search')
@section('content')


<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- Content Header (Page header) -->
<span id="form_output"></span>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; User List with Advanced Search Example </h4>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group margin-bottom-20"> 
                        <a href="{{'create_users_pdf'}}" class="btn btn-success">Export as PDF</a>
                        <a href="{{'export_csv'}}" class="btn btn-success">Export as CSV</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">  

            {!! Form::open([            
            'id' => 'user_search',
            ]) !!}

            <div class="col-md-3" >

                <?php
                $status_array = array();

                $status_array[''] = 'All Status';
                $status_array['1'] = 'Active';
                $status_array['0'] = 'Inactive';


                echo Form::select('search_form_status', $status_array, '', array('class' => 'form-control','onchange' => 'user_filter_status();'));
                ?>
            </div>
            <div class="col-md-3" >
                <?php // echo form_label('Email', 'email', array('class' => 'control-label')); ?> 
                <?php
                echo Form::text('user_search_from', '', array('class' => 'form-control fromdate datepicker','placeholder' => 'From Date'));
                ?>
            </div>
            <div class="col-md-3" >
                <?php // echo form_label('Email', 'email', array('class' => 'control-label')); ?> 
                <?php
                echo Form::text('user_search_to', '', array('class' => 'form-control todate datepicker','placeholder' => 'To date'));
                ?>
            </div>
            
            <div class="col-md-2"> 
                <button type="button" onclick="user_filter()" class="btn btn-info">Submit</button>
                <a class="btn btn-danger btn-sm" onclick="reset();"  title="Reset">
                    <i class="fa fa-repeat"></i>
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="box">            
        <!-- /.box-header -->

        <span style="color:red; align-items: center; display: none;" class="error_delete nortification_msgalert"></span>

        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th style="width: 1px;">#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Created</th>
                        <th>Status</th>                        
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>  
<!-- /.row -->
<script src="{{ asset('resources/assets/plugins/datepicker/bootstrap-datepicker.js') }}" ></script>
<script>
                    $('.datepicker').datepicker({
                        autoclose: true
                    });
</script>

<script src="{{ asset('resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<script>
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                   
//                    $('#table_list').DataTable();

                    var table = $('#table_list').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "advance_datatable_json",
                            "type": "POST",
                            data: {_token: CSRF_TOKEN}
                        },
                        "order": [[1, 'asc']],
                        columns: [
                            {data: 'id', name: 'id',orderable:false,sortable:false},
                            {data: 'username', name: 'username',orderable:true},
                            {data: 'email', name: 'email',orderable:true},                            
                            {data: 'mobile_no', name: 'mobile_no',orderable:true},
                            {data: 'created_at', name: 'created_at',orderable:true},
                            {data: 'is_active', name: 'is_active',orderable:true},                            
                        ],
                        columnDefs: [
            { orderable: false, targets: [ 1, 2, 3 ] } //This part is ok now
        ]
                    });

</script>

<script type="text/javascript">

    function user_filter()
                    {
                        fromdate = new Date($('.fromdate').val());
                        todate = new Date($('.todate').val());
                        if (todate >= fromdate) {
                            var _form = $("#user_search").serialize();
                            $.ajax({
                                data: _form,
                                type: 'post',
                                url: 'search',
                                async: true,
                                success: function (output) {
                                    table.ajax.reload(null, false);
                                }
                            });
                        } else {
                            alert('Start date should always less then End date');                            
                            return false;
                        }
                    }
                    function user_filter_status()
                    {

                        var _form = $("#user_search").serialize();
                        $.ajax({
                            data: _form,
                            type: 'post',
                            url: 'search',
                            async: true,
                            success: function (output) {
                                table.ajax.reload(null, false);
                            }
                        });

                    }

    
    function reset() {
        $(".fromdate").val('');
        $(".todate").val('');
        $(".search_form_status").val('1').trigger('change');
        user_filter_status();
    }

</script>
@endsection
