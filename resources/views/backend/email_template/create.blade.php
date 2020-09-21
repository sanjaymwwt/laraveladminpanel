@extends('backend.layouts.app')
@section('title', 'Add email template')
@section('content')
<script src="{{ asset('resources/assets/plugins/ckeditor_new/ckeditor.js') }}"></script>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-6">
                    <h4><i class="fa fa-plus"></i> &nbsp; <?php echo $title; ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('email_templates') }}" class="btn btn-success"><i class="fa fa-list"></i> List of Email Templates</a>
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
                    'route' => 'email_templates.store',
                    'class' => 'form-horizontal'
                    ]) !!}
                    <div class="form-group"> 
                        {!! Form::label('email_template_for', 'Email Title *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('email_template_for', null, ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('email_template_for'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('email_template_subject', 'Email Subject *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('email_template_subject', null, ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('email_template_subject'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('email_template_body', 'Email Body *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('email_template_body', null, ['class' => 'form-control',]) !!}
                            <span class="error"><?php echo $errors->first('email_template_body'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">                         
                        <div class="col-sm-9">
                            {!! Form::hidden('identifier', null, ['class' => 'form-control', 'size' => 64, ]) !!}
                            
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
        $("input[name='email_template_for']").keyup(function () {
            $("input[name='identifier']").val($(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/\s\s+/g, '-').replace(/[_\s]/g, '-').toLowerCase());
        }).keyup();

        $('#identifier').keyup(function () {
            this.value = this.value.replace(/[^a-z0-9\s]/gi, '-').replace(/\s\s+/g, '-').replace(/[_\s]/g, '-').toLowerCase();
        });
        $(document).on('keyup', '#password', function (e) {

            var password = $(this).val();
            var arr = password.split(' ');
            if (arr[1] == '') {
                alert('space are not allowed!');
                $(this).val('');
            }
        });
        get_editor('email_template_body');

    });




</script>

@endsection
