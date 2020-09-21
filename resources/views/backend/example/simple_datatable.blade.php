@extends('backend.layouts.app')
@section('title', 'Simple Datatable')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- Content Header (Page header) -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-7">
                    <h4><i class="fa fa-list"></i> &nbsp; User List with (Simple Datatables, Export PDF, CSV, EXCEL) Example</h4>
                </div>
                <div class="col-md-5 text-right">
                    <div class="btn-group margin-bottom-20"> 
                        <a href="{{'create_users_pdf'}}" class="btn btn-success">Export as PDF</a>
                        <a href="{{'export_csv'}}" class="btn btn-success">Export as CSV</a>
                        <a href="{{'excelDownload'}}" class="btn btn-success">Export as Excel</a>
                    </div>
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
                        <th style="width: 1px;"><label class="checkcontainer" title="Select All"><input type="checkbox" title="For Select All" class="minimal all_chkbox minimal" /> <span class="checkmark"></span></label></th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Created Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($users as $row):
                        ?>
                        <tr>
                            <td><label class="checkcontainer"><input type="checkbox" name="ids[]" class="chkbox" value="<?php echo $row['id'] ?>"  /> <span class="checkmark"></span></label></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['mobile_no']; ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><input type="checkbox" data-id="<?php echo $row['id']; ?>" class="tgl_checkbox  tgl-ios" <?= ($row['is_active'] == 1) ? "checked" : ""; ?>><label for="cb_<?php echo $row['id'] ?>"></label></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
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
$('#table_list').DataTable();



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
                url: "multidel",
                data: {records_to_del: records_to_del, _token: CSRF_TOKEN},
                success: function (msg) {
                    window.location.reload();
                }
            });
        }
    });



    $("body").on("change", ".tgl_checkbox", function () {
        $.post('users/change_status',
                {
                    _token: CSRF_TOKEN,
                    id: $(this).data('id'),
                    status: $(this).is(':checked') == true ? 1 : 0
                },
                function (data) {
                    console.log(data);
                    if (data != "0") {
                        $.notify("Status Changed Successfully1", "success");
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
