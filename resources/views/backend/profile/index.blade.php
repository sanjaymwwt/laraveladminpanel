@extends('backend.layouts.app')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-pencil"></i> &nbsp; Update Profile</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('admin.changes_pwd')}}" class="btn btn-success"><i class="fa fa-list"></i> Change Password</a>
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
                   
                    {!! Form::open([
                    'route' => 'admin.profileupdate',
                    'class' => 'form-horizontal'
                    ]) !!}
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">User Name</label>

                        <div class="col-sm-9">
                            {!! Form::text('username', $admin['username'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('username'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">First Name</label>

                        <div class="col-sm-9">
                            {!! Form::text('firstname', $admin['firstname'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('firstname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                        <div class="col-sm-9">                           
                            {!! Form::text('lastname', $admin['lastname'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('lastname'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-9">                            
                            {!! Form::text('email', $admin['email'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>

                        <div class="col-sm-9">
                           
                            {!! Form::text('mobile_no', $admin['mobile_no'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('mobile_no'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Update Profile" class="btn btn-info pull-right">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>  

</section> 


@endsection
