@extends('backend.layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-pencil"></i> &nbsp; Change Password</h4>
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
                    'route' => 'admin.changes_pwd',
                    'class' => 'form-horizontal'
                    ]) !!}

                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">New Password</label>

                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="">                            
                            <span class="error"><?php echo $errors->first('password'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_pwd" class="col-sm-3 control-label">Confirm Password</label>

                        <div class="col-sm-8">
                            <input type="password" name="password_confirmation" class="form-control" id="confirm_pwd" placeholder="">                            
                            <span class="error"><?php echo $errors->first('password_confirmation'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-info pull-right">
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
