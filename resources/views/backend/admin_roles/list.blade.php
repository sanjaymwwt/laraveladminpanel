@extends('backend.layouts.app')
@section('title', 'Admin Roles')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Admin Roles & Permissions</h4>
                </div>

                <div class="col-md-6 text-right"> 
                    <?php
                    if (in_array('add', $data['users_rights'])) {
                        ?>
                        <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New Role </a>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div> 
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Admin Role</th>
                        <?php if (in_array('change_status', $data['users_rights'])) { ?>
                            <th width="100">Status</th>
                        <?php } ?>
                        <th width="100">Permission</th>
                        <?php if (in_array('edit', $data['users_rights']) || in_array('delete', $data['users_rights'])) { ?>
                            <th width="100">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['roles'])) {
                        foreach ($data['roles'] as $record):
                            ?>
                            <tr>
                        <form action="{{ route('roles.destroy',$record['admin_role_id']) }}" method="POST">
                            <td><?php echo $record['admin_role_id']; ?></td>
                            <td><?php echo $record['admin_role_title']; ?></td>
                            <?php if (in_array('change_status', $data['users_rights'])) { ?>
                                <td><input class='tgl tgl-ios tgl_checkbox' 
                                           data-id="<?php echo $record['admin_role_id']; ?>" 
                                           id='cb_<?= $record['admin_role_id'] ?>' 
                                           type='checkbox' <?php echo ($record['admin_role_status'] == 1) ? "checked" : ""; ?> />
                                    <label class='tgl-btn' for='cb_<?= $record['admin_role_id'] ?>'></label>
                                </td>
                            <?php } ?>

                            <td>
                                <a href="{{ route('roles.access',$record['admin_role_id']) }}" class="btn btn-info btn-xs mr5" >
                                    <i class="fa fa-sliders"></i>
                                </a>
                            </td>
                            <?php if (in_array('edit', $data['users_rights']) || in_array('delete', $data['users_rights'])) { ?>
                                <td>
                                    <?php if (!in_array($record['admin_role_id'], array(1))): ?>
                                    <?php if (in_array('edit', $data['users_rights'])) { ?>
                                    <a href="{{ route('roles.edit',$record['admin_role_id']) }}" class="btn btn-warning btn-xs mr5" >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php } ?>
                                    <?php if (in_array('delete', $data['users_rights'])) { ?>
                                    @csrf
                                    @method('POST')

                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-remove"></i></button>
                                    <?php } ?>
                                    <?php endif; ?>
                                </td>
                            <?php } ?>
                        </form>
                        </tr>
                        <?php
                    endforeach;
                } else {
                    ?>
                    <tr><td colspan="5">No record Found!</td></tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("body").on("change", ".tgl_checkbox", function () {
        $.post('roles/change_status',
                {
                    _token: CSRF_TOKEN,
                    id: $(this).data('id'),
                    status: $(this).is(':checked') == true ? 1 : 0
                },
                function (data) {
                    $.notify("Status Changed Successfully", "success");
                });
    });

</script>
@endsection
