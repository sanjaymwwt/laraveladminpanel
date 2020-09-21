@extends('backend.layouts.app')
@section('title', 'Email template list')
@section('content')


<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- Content Header (Page header) -->
<span id="form_output"></span>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; List of Email Templates  </h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('email_templates.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Email Template </a>
                </div>

            </div>
        </div>
    </div>

    
    <div class="box">    
        <div class="box-header">
            <?php
            ?>
            <a title="Delete row selected rows!" class="delete-href btn-sm btn-danger" data-href="#" data-toggle="modal" data-target="#confirm-delete"> 
                <b>Delete</b>
            </a>
            <?php
            ?>
        </div>
        <!-- /.box-header -->

        <span style="color:red; align-items: center; display: none;" class="error_delete nortification_msgalert"></span>

        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th style="width: 1px;"><label class="checkcontainer" title="Select All"><input type="checkbox" title="For Select All" class="all_chkbox" /> <span class="checkmark"></span></label></th>
                        <th>Email For</th>
                        <th>Email Subject</th>
                        <th>Email Body</th>
                        <th style="width: 130px;" >Created</th>
                        <th style="text-align: center !important;">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>  
<!-- /.row -->
<div id="confirm-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<script>
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(document).on('click', '.all_chkbox', function () {
                        if ($(this).prop("checked") == true) {
                            $('.chkbox').prop('checked', true);
                        } else {
                            $('.chkbox').prop('checked', false);
                        }
                    });
//                    $('#table_list').DataTable();

                    var table = $('#table_list').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                            "url": "email_templates/datatable_json",
                            "type": "POST",
                            data: {_token: CSRF_TOKEN}
                        },
                        "order": [[1, 'asc']],
                        columns: [
                            {data: 'id', name: 'id',orderable:true},
                            {data: 'email_template_for', name: 'email_template_for',orderable:true},
                            {data: 'email_template_subject', name: 'email_template_subject',orderable:true},                            
                            {data: 'email_template_body', name: 'email_template_body',orderable:true},
                            {data: 'created_at', name: 'created_at',orderable:true},
                            {data: 'action', name: 'action',orderable:true},
                        ],
                        columnDefs: [
            { orderable: false, targets: [ 1, 2, 3 ] } //This part is ok now
        ]
                    });

</script>

<script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script type="text/javascript">

    $('#confirm-delete').on('show.bs.modal', function (e) {

        var records_to_del = [];
        $("input[name='ids[]']:checked").each(function () {
            records_to_del.push($(this).val());
        });

        if (records_to_del.length == 0) {
            e.preventDefault();
            alert('Please select any one row!');
        }
    });

    $(document).on('click', '.btn-ok', function (event) {

        var records_to_del = [];
        $("input[name='ids[]']:checked").each(function () {
            records_to_del.push($(this).val());
        });

        if (records_to_del.length > 0) {
            $.ajax({
                type: 'POST',
                url: "email_templates/multidel",
                data: {records_to_del: records_to_del, _token: CSRF_TOKEN},
                success: function (msg) {                    
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
