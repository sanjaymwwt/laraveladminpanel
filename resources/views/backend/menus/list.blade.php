@extends('backend.layouts.app')
@section('title', 'Menu manager')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/plugins/iCheck/all.css') }}">
<!-- Content Header (Page header) -->
<style>
    .create_menu{
        min-height: auto !important;
        margin-bottom: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
<div class="alert alert-success alert-dismissible msg" style='display:none;'>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>                            
</div>
<section class="content-header">
    <h1>
        Menu Manager 
    </h1> 
</section>
<section class="content create_menu"> 

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body" style="padding: 0px;">
                    <div class="row margin">
                        <form class="form-horizontal">
                            <!--<div class="form-group">-->
                            <label for="inputEmail3" class="col-sm-2 control-label">Select a menu to edit:</label>
                            <div class="col-sm-3" style="padding-left: 0px;">
                                <select class="form-control" name="menu_name" id="change_menu">
                                    <?php
                                    if (!empty($data['mst_menu_list'])) {
                                        foreach ($data['mst_menu_list'] as $value) {
                                            ?>
                                            <option value="<?= $value['id'] ?>" <?= ($data['mst_menu_asc_id'] == $value['id']) ? 'selected="selected"' : ''; ?> ><?= $value['menu_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--</div>-->
                            <label class="col-sm-2 control-label" style="text-align: left;">
                                or <a href="javascript:void(0);" data-toggle="modal" data-target="#create_menu_modal" id="create_menu_modal_link"><u>Create a new menu</u></a>
                            </label>                            
                        </form>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>

 {!! Form::open([
                    'route' => 'menus',
                    'class' => 'form-horizontal',
                    'id' => 'hidden_menu_form',                   
                    ]) !!}
                    <input type="hidden" value="<?php echo $data['mst_menu_asc_id'];?>" name="hidden_mst_menu_id_post" id="hidden_mst_menu_id_post" />
{!! Form::close() !!}              
<section class="content"> 

    <div class="row">
        <div class="col-md-4">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title"> Page List</h3>
                </div>
                <div class="box-body" style="overflow-y: scroll;max-height: 400px;">
                    <?php // echo form_open(base_url('admin/menus/add_menu')); ?>
                    <input type="hidden" value="<?= $data['mst_menu_asc_id']; ?>" name="hidden_mst_menu_id" id="hidden_mst_menu_id" />
                    <div class="form-group">
                        <div class="table-responsive menu_page_table">
                            <table  class="table table-bordered table-striped" width="100%">
                                <tbody>
                                    <?php foreach ($data['records'] as $record) { ?>
                                        <tr>
                                            <td style="width: 15%" align="center">
                                                <input type="checkbox" name="pageid[]" class="minimal-red chkbox" value="<?= $record['page_id']; ?>">
                                            </td>
                                            <td><?= strtoupper($record['page_name']); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input type="button" name="submit" id="add_page_in_menulist" value="Add Menu" class="btn btn-info pull-right">
                    </div>
                    <?php // echo form_close(); ?>
                    <!-- /.form group -->  
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box --> 
        </div>
        <!-- /.col (left) -->
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Menu Name</h3> <input type="text" name="menu_name_update" class="menu_name_update" id="menu_name_update" value="" style="color: black" /> 
                    <div class="pull-right"> 
                        <button id="btnReset" type="button" title="Reset Menu" data-toggle="tooltip" class="btn btn-danger">
                            <i class="glyphicon glyphicon-repeat"></i></button>
                        <button id="delete_menu_modal_link" title="Delete Menu" type="button" data-toggle="tooltip" class="btn btn-danger  clickable">
                            <i class="glyphicon glyphicon-remove clickable"></i></button>                            
                    </div>
                </div>
                <div class="box-body"> 
                    <ul id="myEditor" class="sortableLists list-group"></ul> 
                    <div class="form-group pull-right"> 
                        <button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Save Menu</button>
                    </div>
                    <div class="form-group"  style="display: none">
                        <textarea id="out" class="form-control" cols="50" rows="10"></textarea>
                    </div>
                </div>

            </div>  
        </div> 
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->

<div class="modal" id="create_menu_modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span></button>
                <h4 class="modal-title">Add Menu</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal row">
                    <div class="col-sm-12">
                        <label for="inputEmail3" class="control-label"><strong>Menu Name:</strong></label>
                        <input class="form-control" name="menu_name" value="" id="create_new_menu">
                        <span id="menu_name_error" style="display: none; color: red;">This field is required.</span>
                        <span id="menu_name_exists_error" style="display: none; color: red;">This Menu Name already exists. Please choose another name.</span>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="create_menu_save_btn">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="delete_menu_modal" class="modal fade" role="dialog">
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
                <button type="button" class="btn btn-primary" id="delete_menu_btn">Delete</button>
            </div>
        </div>

    </div>
</div>
<p id="load_data" style="display: none"><?php echo $data['menu_arr']; ?></p>

<script src="{{ asset('resources/assets/bootstrap/js/bs-iconpicker/js/bootstrap-iconpicker.js') }}" ></script>
<script src="{{ asset('resources/assets/bootstrap/js/jquery-menu-editor.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/iCheck/icheck.min.js') }}" ></script>

<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).on('click', '#add_page_in_menulist', function () {
    var hidden_mst_menu_id = $('#hidden_mst_menu_id').val();

    var checked = []
    $("input[name='pageid[]']:checked").each(function ()
    {
        checked.push(parseInt($(this).val()));
    });

    $.ajax({
        type: 'POST',
        url: 'menus/add_menu',
        data: {
            _token: CSRF_TOKEN,
            'pageid': checked,
            'hidden_mst_menu_id': hidden_mst_menu_id
        },
        success: function (response) {
            $('#hidden_menu_form').submit();
        }
    });


});
$(document).on('click', '#create_menu_modal_link', function () {
    $('#create_new_menu').val('');
    $('#menu_name_exists_error').hide();
    $('#menu_name_error').hide();
});
$(document).on('change', '#change_menu', function () {

    $('#hidden_mst_menu_id_post').val($(this).val());
    $('#hidden_mst_menu_id').val($(this).val());

    var menu_name = $.trim($("#change_menu option:selected").text());
    $('#menu_name_update').val(menu_name);
    $('#hidden_menu_form').submit();

});
$(document).on('click', '#create_menu_save_btn', function () {
    var menu_name = $('#create_new_menu').val();

    if (menu_name != '') {
        $('#menu_name_error').hide();
        $.ajax({
            type: 'POST',
            url: 'menus/save_menu_name',            
            data: {
                _token: CSRF_TOKEN,
                'menu_name': menu_name
            },
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);                
                if (response.success !== undefined) {
                    $('#menu_name_exists_error').hide();
                    $('#create_menu_modal').modal('hide');
                    if (response.option !== 'undefined') {
                        $('#change_menu').append(response.option);

                    }
                    $('.msg').show();
                    $('.msg').find('h4').html('Menu added successfully!');
                    setTimeout(function () {
                        $('.alert-success').hide();
                    }, 2000);
                } else {
                    $('#menu_name_exists_error').show();
                }
            }
        });
    } else {
        $('#menu_name_error').show();
    }

});
$(document).on('click', '#delete_menu_modal_link', function () {
    $('#delete_menu_modal').modal('show');
    menu_name = $("#change_menu option:selected").text();
    $('#delete_menu_modal').find('.modal-body').html('<p>Are you want to sure delete this "' + menu_name + '" menu ?</p>');
});
$(document).on('click', '#delete_menu_btn', function () {
    var menu_name = $('#change_menu').val();

    if (menu_name != '') {
        $('#menu_name_error').hide();
        $.ajax({
            type: 'POST',
            url: 'menus/delete_main_menu',
            data: {
                _token: CSRF_TOKEN,
                'menu_name': menu_name
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.success !== undefined) {
                    $('#delete_menu_modal').modal('hide');
                    $('#change_menu').trigger('change');
                    location.reload();
                } else {
                    $('#menu_name_exists_error').show();
                }
            }
        });
    }

});


jQuery(document).ready(function () {

    var menu_name = $.trim($("#change_menu option:selected").text());

    $('#menu_name_update').val(menu_name);

    // menu items
    var strjson = $("#load_data").text();
    console.log(strjson);
    //icon picker options
    var iconPickerOptions = {searchText: 'Buscar...', labelHeader: '{0} de {1} Pags.'};
    //sortable list options
    var sortableListOptions = {
        placeholderCss: {'background-color': 'cyan'}
    };

    var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions, labelEdit: 'Edit'});
    editor.setForm($('#frmEdit'));
    editor.setUpdateButton($('#btnUpdate'));
    editor.setData(strjson);

    console.log(editor.getString());

    $('#btnOut').on('click', function () {
        var hidden_mst_menu_id = $('#hidden_mst_menu_id').val();
        var menu_name = $('#menu_name_update').val();
        var str = editor.getString();
        var post_data = {
            _token: CSRF_TOKEN,
            'text': str,
            'mst_menu_id': hidden_mst_menu_id,
            'menu_name': menu_name
        };
        $.ajax({
            type: 'POST',
            url: 'menus/save_menu',
            data: post_data,
            success: function (response) {
                location.reload();
            }
        });
    });


    $("#btnReset").click(function () {
        var yes = confirm("Are you sure want to reset menu?");
        if (yes == true) {
            var hidden_mst_menu_id = $('#hidden_mst_menu_id').val();
            var post_data = {
                _token: CSRF_TOKEN,
                'mst_menu_id': hidden_mst_menu_id
            };
            $.ajax({
                type: 'POST',
                url: 'menus/reset_list',
                data: post_data,
                success: function (response) {
                    location.reload();
                }
            });
        }
    });

    $(".btnRemove").click(function () {
        var yes = confirm("Are you sure want to delete?");
        if (yes == true) {
            var list = $(this).closest('ul');
            var value = $(this).closest('li');
            var mid = value.attr('data-value');
            var post_data = {
                _token: CSRF_TOKEN,
                'mid': mid
            };
            $.ajax({
                type: 'POST',
                url: 'menus/delete_menu_page',
                data: post_data,
                success: function (d) {
                    location.reload();
                }
            });
            $(this).closest('li').remove();
            var isMainContainer = false;
            if (typeof list.attr('id') !== 'undefined') {
                isMainContainer = (list.attr('id').toString() === idSelector);
            }
            if ((!list.children().length) && (!isMainContainer)) {
                list.prev('div').children('.sortableListsOpener').first().remove();
                list.remove();
            }
            MenuEditor.updateButtons($main);
        }
    });
});


$(function () {
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

@endsection
