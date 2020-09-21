@extends('backend.layouts.app')
@section('title', 'Pagination')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- Content Header (Page header) -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-7">
                    <h4><i class="fa fa-list"></i> &nbsp; User List with Pagination Example</h4>
                </div>
                <div class="col-md-5 text-right">
                    <div class="btn-group margin-bottom-20"> 
                        <a href="{{'create_users_pdf'}}" class="btn btn-success">Export as PDF</a>
                        <a href="{{'export_csv'}}" class="btn btn-success">Export as CSV</a>                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="box">    
        
        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th style="width: 1px;">ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($users as $row):
                        ?>
                        <tr>
                            <td><?= $i++;?></td>
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


@endsection
