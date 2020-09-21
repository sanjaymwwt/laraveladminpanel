@extends('backend.layouts.app')
@section('title', 'Edit admin roles')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-6">
                    <h4><i class="fa fa-plus"></i> &nbsp; <?php echo $title; ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin_roles') }}" class="btn btn-success"><i class="fa fa-list"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                                              
                <div class="box-body my-form-body">
                    {{ Form::open(['route' => ['roles.update', $role['admin_role_id']],  'method' => 'POST','class' => 'form-horizontal']) }}   
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="form-group"> 
                                    {!! Form::label('admin_role_title', 'Admin Role *', ['class' => 'col-sm-4']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('admin_role_title', $role['admin_role_title'], ['class' => 'form-control',]) !!}
                                        <span class="error"><?php echo $errors->first('admin_role_title'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Admin Role Status</label>
                                    <div class="radio">
                                        <label>
                                            
                                            {!! Form::radio('admin_role_status', 1, ($role['admin_role_status'] == '1' ? true : false)) !!}
                                            Active
                                        </label>
                                        &nbsp;&nbsp;
                                        <label>
                                            {!! Form::radio('admin_role_status', 0, ($role['admin_role_status'] == '0' ? true : false)) !!}

                                            Inactive
                                        </label>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="submit" value="submit"  />                        
                        {!! Form::submit('Submit', ['class' => 'btn btn-success pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>


                <!-- /.box-body -->
            </div>
        </div>
    </div>  

</section> 
<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $(document).on('keyup', '#password', function (e) {

            var password = $(this).val();
            var arr = password.split(' ');
            if (arr[1] == '') {
                alert('space are not allowed!');
                $(this).val('');
            }
        });

    });




</script>

@endsection
