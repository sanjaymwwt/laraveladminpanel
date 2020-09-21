@extends('backend.layouts.app')
@section('title', 'Edit admin')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-6">
                    <h4><i class="fa fa-plus"></i> &nbsp; <?php echo $title; ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin') }}" class="btn btn-success"><i class="fa fa-list"></i> Admin List</a>
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
                    {{ Form::open(['route' => ['admin.update', $data['admin']['admin_id']],  'method' => 'POST','class' => 'form-horizontal']) }}                                  
                    <div class="form-group"> 
                        {!! Form::label('username', 'User Name', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::label('username', $data['admin']['username'], ['class' => 'control-label']) !!}
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('firstname', 'First Name *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('firstname', $data['admin']['firstname'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('firstname'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('lastname', 'Last Name *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('lastname', $data['admin']['lastname'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('lastname'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('email', 'Email *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('email', $data['admin']['email'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('mobileno', 'Mobile No *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('mobileno', $data['admin']['mobile_no'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('mobileno'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('role', 'Select Admin Role *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">                            
                            <?php 
                            $roleArr = array();

                            $roleArr[''] = " -- Select Role -- ";
                            foreach ($data['admin_roles'] as $role) {

                                $roleArr[$role['admin_role_id']] = $role['admin_role_title'];
                            }
                            echo Form::select('role', $roleArr, $data['admin']['admin_role_id'], array('class' => 'form-control')); ?>
                            <span class="error"><?php echo $errors->first('role'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-2"></div>
                        <div class="col-md-10">{!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}</div>
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
