@extends('backend.layouts.app')
@section('title', 'Edit page')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-6">
                    <h4><i class="fa fa-plus"></i> &nbsp; <?php echo $title; ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('front_pages') }}" class="btn btn-success"><i class="fa fa-list"></i> Pages List</a>
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
                    {{ Form::open(['route' => ['front_pages.update', $data['pages']['page_id']],  'method' => 'POST','class' => 'form-horizontal']) }}                                  
                    <div class="form-group"> 
                        {!! Form::label('page_name', 'Page Name *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('page_name',  $data['pages']['page_name'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('page_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('target', 'Target *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            <?php
                            $optionArr = array();
                            $target = array(
                                '0' => array('id' => 'Self', 'val' => 'Self'),
                                '1' => array('id' => 'Blank', 'val' => 'Blank'),
                                '2' => array('id' => 'Top', 'val' => 'Top'),
                            );
                            foreach ($target as $val) {

                                $optionArr[$val['id']] = $val['val'];
                            }
                            echo Form::select('target', $optionArr, $data['pages']['page_target'], array('class' => 'form-control'));
                            
                            ?>
                            <span class="error"><?php echo $errors->first('target'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('url_type', 'Page Type  *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            <?php
                            $urls = array(
                                '0' => array('id' => 'internal', 'val' => 'Internal Link'),
                                '1' => array('id' => 'customized', 'val' => 'Customized Link'),
                            );
                            $urlArr = array();
                            foreach ($urls as $val) {

                                $urlArr[$val['id']] = $val['val'];
                            }
                            echo Form::select('url_type', $urlArr, $data['pages']['url_type'], array('class' => 'form-control','id' => 'type'));
                            
                            ?>
                            <span class="error"><?php echo $errors->first('url_type'); ?></span>
                        </div>
                    </div>
                    <div class="form-group internalmainDiv"> 
                        {!! Form::label('page_description', 'Page Description', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            <textarea name="page_description" id="page_description"><?php echo $data['pages']['page_description'];?></textarea>
                            <span class="error"><?php echo $errors->first('page_description'); ?></span>
                        </div>
                    </div>
                    <div class="form-group urlmainDiv"> 
                        {!! Form::label('url', 'URL *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('url', $data['pages']['page_url'], ['class' => 'form-control', 'size' => 64, ]) !!}
                            <span class="error"><?php echo $errors->first('url'); ?></span>
                        </div>
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('page_status', 'Status *', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="page_status" value="0" <?php
                                    if (isset($data['pages']['status']) && $data['pages']['status'] == '0') {
                                        echo 'checked';
                                    }
                                    ?> checked="checked">
                                    Active
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="page_status" <?php
                                    if (isset($data['pages']['status']) && $data['pages']['status'] == '1') {
                                        echo 'checked';
                                    }
                                    ?> value="1">
                                    Inactive
                                </label>
                            </div>
                            <span class="error"><?php echo $errors->first('page_status'); ?></span>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script language="javascript">
    $(document).ready(function () {
        $("input[name='page_name']").keyup(function () {
            $("input[name='identifier']").val($(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/\s\s+/g, '-').replace(/[_\s]/g, '-').toLowerCase());
        }).keyup();

        $('#identifier').keyup(function () {
            this.value = this.value.replace(/[^a-z0-9\s]/gi, '-').replace(/\s\s+/g, '-').replace(/[_\s]/g, '-').toLowerCase();
        });
        get_editor('page_description');
    });
</script>
<script type="text/javascript">
    var type = $('#type').val();
    if (type == 'customized') {
        $(".urlmainDiv").show();
        $(".internalmainDiv").hide();
    } else {
        $(".urlmainDiv").hide();
        $(".internalmainDiv").show();
    }

    $('#type').change(function () {
        var type = $('#type').val();
        if (type == 'customized') {
            $(".urlmainDiv").show();
            $(".internalmainDiv").hide();
        } else {
            $(".urlmainDiv").hide();
            $(".internalmainDiv").show();
        }
    });
</script>

@endsection
