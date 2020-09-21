
@extends('backend.layouts.app')
@section('title', 'Jquery Validation')
@section('content')
<style>
    .txtcls{
        width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;
    }
</style>
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/select2/dist/css/select2.min.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<style>
    .html5cls {width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px};
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Jquery Form Elements
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Jquery Validate Form</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    {!! Form::open([

    'id' => 'validateFrm'
    ]) !!}
    <div class="row">
        <div class="col-md-12">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">First Form</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label for="simple">Simple Input</label>

                        <div class="input-group col-md-12">
                            {!! Form::text('simple', null, ['class' => 'form-control', 'size' => 64,'id' => 'simple1' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date masks:</label>

                        <div class="input-group col-md-12">
                            <?php
                            $targetSal = '';
                            $optionArr = array();
                            $target = array(
                                '0' => array('id' => '', 'val' => 'Select state'),
                                '1' => array('id' => '1', 'val' => 'Alabama'),
                                '2' => array('id' => '2', 'val' => 'Alaska'),
                                '3' => array('id' => '3', 'val' => 'California'),
                            );
                            foreach ($target as $val) {

                                $optionArr[$val['id']] = $val['val'];
                            }
                            echo Form::select('field1', $optionArr, '', array('class' => 'form-control select2'));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date masks:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="field2" id="field2" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- date picker in dd//mm/yyyy format -->
                    <div class="form-group">
                        <label>Date:(DD/MM/YYYY)</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>                                  
                            {!! Form::text('date112', null, ['class' => 'form-control pull-right', 'size' => 64,'id' => 'datepicker12' ]) !!}
                        </div>
                    </div>
                    <!-- /.form group -->

                    <!-- phone mask -->

                    <div class="form-group">
                        <label>US phone mask:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="phone" id="field3" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- IP mask -->
                    <div class="form-group">
                        <label>IP mask:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <input type="text" name="ip" id="field4" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Color picker:</label>

                        <div class="input-group col-md-12">
                            {!! Form::text('color1', null, ['class' => 'form-control my-colorpicker1', 'size' => 64,'id' => 'field5' ]) !!}
                        </div>
                    </div>                    
                    <!-- /.form group -->

                    <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Time picker:</label>

                            <div class="input-group">                                                                    
                                {!! Form::text('time1', null, ['class' => 'form-control timepicker1', 'size' => 64,'id' => 'timepicker1' ]) !!}
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>                                        
                            {!! Form::text('date11', null, ['class' => 'form-control  pull-right', 'size' => 64,'id' => 'datepicker1' ]) !!}
                        </div>
                    </div>        

                    <!-- Date range -->
                    <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>                            
                            {!! Form::text('daterange1', null, ['class' => 'form-control  pull-right', 'size' => 64,'id' => 'reservation1' ]) !!}                            
                        </div>
                    </div> 


                    <div class="form-group">
                        <label>                            
                            <?php
                            echo Form::checkbox('check1', 'accept', array('class' => 'minimal', 'id' => 'check1', 'checked' => FALSE));
                            ?>

                        </label>
                        <label>
                            <?php
                            echo Form::checkbox('check12', 'accept', array('class' => 'minimal', 'id' => 'check12', 'checked' => FALSE));
                            ?>
                        </label>

                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <?php
                            echo Form::radio('r1', 'accept', array('class' => 'minimal', 'id' => 'r1', 'checked' => FALSE));
                            ?>       

                        </label>
                        <label>
                            <?php
                            echo Form::radio('r1', 'accept', array('class' => 'minimal', 'id' => 'r1', 'checked' => FALSE));
                            ?>
                        </label>                        
                    </div>
                    <div class="form-group">
                        <label>Editor:</label>

                        <div class="input-group">                            

                            {!! Form::textarea('editor1', null, ['class' => 'form-control pull-right','rows' => "10",'cols' => "80",'id' => 'editor1' ]) !!}                            
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>HTML5 Editor:</label>

                        <div class="input-group">                            

                            {!! Form::textarea('html5editor1', null, ['class' => 'form-control textarea html5cls txtcls','id' => 'html5editor1','style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;' ]) !!}                            
                        </div>
                    </div>                    
                    <!-- Minimal red style -->

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (left) -->

        <!-- /.col (right) -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <input type="submit" name="submit" value="Validate Form" class="btn btn-primary pull-right">
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
    {!! Form::close() !!}
</section>
<!-- /.content -->
<script src="{{ asset('resources/assets/bower_components/select2/dist/js/select2.full.min.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/input-mask/jquery.inputmask.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/input-mask/jquery.inputmask.extensions.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('resources/assets/plugins/daterangepicker/daterangepicker.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/datepicker/bootstrap-datepicker.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/colorpicker/bootstrap-colorpicker.min.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}" ></script>
<script src="{{ asset('resources/assets/plugins/iCheck/icheck.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bootstrap/js/jquery.validate.min.js') }}" ></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{{ asset('resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" ></script>

<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    // CKEDITOR.replace('editor2');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
    $("input[type='checkbox'][name='check222']").change(function () {
        alert('safsdv');
    });


});
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        $(".select22").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker1        
        $('.cancelBtn').click();
        $('#reservation1').daterangepicker({autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#reservation1').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            $('#reservation1-error').hide();
            $('#reservation1').removeClass('error');
        });

        $('#reservation1').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
        //Date range picker2     
        $('#reservation2').daterangepicker({autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#reservation2').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            $('#reservation2-error').hide();
            $('#reservation2').removeClass('error');
        });

        $('#reservation2').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html();
                    $('#daterange input').val('');
                }
        );

        //Date picker
        $('#datepicker1').datepicker({
            autoclose: true
        });
        $('#datepicker12').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
        });
        $('#datepicker22').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
        });
        $('#datepicker2').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker1").timepicker({
            showInputs: false
        });
        $(".timepicker2").timepicker({
            showInputs: false
        });
    });
    $("#validateFrm input[name='r2']").click(function () {
        alert('asvd');

    });

    $(document).ready(function () {

        $('form[id="validateFrm"]').validate({
            ignore: [],
            rules: {
                simple2: 'required',
                simple: 'required',
                field1: 'required',
                field22: "required",
                date112: "required",
                field2: 'required',
                phone: 'required',
                phone2: 'required',
                date22: 'required',
                date221: 'required',
                ip: 'required',
                ip2: 'required',
                color1: 'required',
                picker2: "required",
                time1: 'required',
                time2: 'required',
                date11: 'required',
                daterange1: 'required',
                picker2: 'required',
                check222: 'required',
                colorpicker2: 'required',
                // check1[]: 'required',
                "check1[]": {
                    required: true,
                    minlength: 1
                },
                r1: 'required',
                r2: {
                    required: true,
                },
                range2: 'required',
                html5editor1: 'required',
                html5editor2: 'required',
                editor1: {
                    ckrequired: true
                },
                editor2: {
                    ckrequired: true
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                field22: ' Date field is required',
                r2: {
                    required: 'Second form Radio is required',
                },
                time2: 'Second form time is required',
                range2: 'Date Range is required',
                ip2: 'IP mask is required',
                colorpicker2: 'Second form colorpicker is required',
                simple2: 'Second form input is required',
                picker2: 'Date picker is required',
                date221: 'Second form date picker is required',
                phone2: 'Phone is required',
                check222: 'Second form checkbox is required',
                date22: 'Date Masks is required',
                user_email: 'Enter a valid email',
                editor2: 'Second form editor is required',
                html5editor2: 'Second form html5 editor is required',
                "check1[]": "Please select at least one checkbox",
                psword: {
                    minlength: 'Password must be at least 8 characters long'
                }
            },

            submitHandler: function (form) {
                //form.submit();
            }
        });

    });
    $.validator.addMethod('ckrequired', function (value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return messageLength.length !== 0;
    }, "This field is required");
</script>

<script>
    $("#forms").addClass('active');
    $("#jqueryVali").addClass('active');
</script>  

@endsection
