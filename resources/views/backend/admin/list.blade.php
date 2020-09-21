@extends('backend.layouts.app')
@section('title', 'Admin list')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">

<span id="form_output"></span>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Admin List </h4>
                </div>
                <div class="col-md-6 text-right">
                    <?php
                    if (in_array('add', $data['users_rights'])) {
                        ?>
                        <a href="{{ route('admin.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New Admin </a>
                    <?php } ?>
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

            <div class="col-sm-3">
                <div class="form-group">

                    <?php
                    $roleArr = array();

                    $roleArr[''] = " -- All Admin Types -- ";
                    foreach ($data['admin_roles'] as $role) {

                        $roleArr[$role['admin_role_id']] = $role['admin_role_title'];
                    }
                    echo Form::select('type', $roleArr, '', array('class' => 'form-control', 'onchange' => 'getdata()'));
                    ?>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">                    
                    <?php
                    $status_array = array();

                    $status_array[''] = 'All Status';
                    $status_array['1'] = 'Active';
                    $status_array['0'] = 'Inactive';
                    echo Form::select('status', $status_array, '', array('class' => 'form-control', 'onchange' => 'getdata()'));
                    ?>
                </div>
            </div>              
            {!! Form::close() !!}
        </div>
    </div>

    <div class="box">    
        <div class="box-header">            
        </div>
        <!-- /.box-header -->

        <span style="color:red; align-items: center; display: none;" class="error_delete nortification_msgalert"></span>

        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>                        
                        <th width="100">Status</th>
                        <th width="120">Action</th>
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
        "url": "admin/datatable_json",
        "type": "POST",
        data: {_token: CSRF_TOKEN}
    },
    "order": [[1, 'asc']],
    columns: [
        {data: 'firstname', name: 'firstname', orderable: true},
        {data: 'username', name: 'username', orderable: true},
        {data: 'email', name: 'email', orderable: true},
        {data: 'admin_role_title', name: 'admin_role_title', orderable: true},
        {data: 'status', name: 'status', orderable: true},
        {data: 'action', name: 'action', orderable: true},
    ],
    columnDefs: [
        {orderable: false, targets: [1, 2, 3]} //This part is ok now
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
                url: "users/multidel",
                data: {records_to_del: records_to_del, _token: CSRF_TOKEN},
                success: function (msg) {
                    getdata();
                    $('#confirm-delete').modal('toggle');
                    $('.error_delete').show();
                    $('.error_delete').text('Rows deleted successfully.');
                    setTimeout(function () {
                        $('.error_delete').hide();
                    }, 5000);
                }
            });
        }
    });

    function reset() {
        $(".search_form_email").val('');
        $(".search_form_status").val('1').trigger('change');
        getdata();
    }

    function getdata() {
        var _form = $("#user_search").serialize();
        $.ajax({
            data: _form,
            type: 'post',
            url: 'admin/search',
            async: true,
            success: function (output) {
                table.ajax.reload(null, false);
            }
        });
    }
    function deleteAdmin() {
        if (!confirm("Are you sure want to delete?"))
            event.preventDefault();
    }

    $("body").on("change", ".tgl_checkbox", function () {
        $.post('admin/change_status',
                {
                    _token: CSRF_TOKEN,
                    id: $(this).data('id'),
                    status: $(this).is(':checked') == true ? 1 : 0
                },
                function (data) {
                    console.log(data);
                    if (data != "0") {
                        $.notify("Status Changed Successfully", "success");
                    } else {
                        $.notify("You have no rights for change status.", "error");
                    }
                    table.ajax.reload(null, false);
                }, "json");
    });
    $('#user_search').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
@endsection
