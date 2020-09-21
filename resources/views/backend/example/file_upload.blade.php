@extends('backend.layouts.app')
@section('title', 'File Upload')
@section('content')

<style type="text/css">
    #file-upload {
        position: absolute;
        left: -9999px;
    }
    label[for="file-upload"]{
        padding:1em;  
        display:inline-block;
        background:#064D06;
        color: #fff;
        cursor:pointer;
        &:hover{color:#fff}
    }
    .btn-upload{
        padding:1em;  
        display:inline-block;
        background:#011401;
        color: #fff;
        cursor:pointer;
        margin-left: -5px;
        border: 0;
    }
    #filename{
        padding:1em;
        float:left;
        width:380px;
        white-space: nowrap;
        overflow:hidden;
        color: #fff;
        background:#3c763d;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-file"></i> &nbsp; File Upload Example</h4>
                </div>  
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">
            <span class="alert alert-success succClass" style="display: none;"></span>
            <span class="alert alert-danger errClass" style="display: none;"></span>
            <p class="lead">No Plugins </p>
            <!-- Upload  -->
            {!! Form::open([            
            'id' => 'submit',
            ]) !!}
            <span id="filename">Select your file</span>
            <label for="file-upload">Browse<input type="file" name="userfile" class="copyblock_img_input" id="file-upload"></label>
            <input type="submit" name="submit" id="upload" value="Upload" class="btn-upload" /><span class="loading_icon" style="display:none;"><i class="fa fa-spinner fa-spin"></i></span>  
            <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg</small></p>
            {!! Form::close() !!}       
            <div class="col-md-12" id="uploaded_img" style=" margin-top:10px; ">
                <div class="col-md-3"></div>
                <div class="col-md-6 upload_img_div" id="upload_img_div">
                    <span class="single-image-wrap">

                    </span>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div id="uploadedData"></div>

        </div>	
    </div>
</section>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#file-upload').change(function () {
        var filepath = this.value;
        var m = filepath.match(/([^\/\\]+)$/);
        var filename = m[1];
        $('#filename').html(filename);

    });
    // In edit mode unlink image and delete image here
    function deletImage(e) {        
        image = e.attr('data-img');
        if (confirm("Are you sure want to delete this Image?")) {           
            $.ajax({
                data: {img: image,type:'image', _token: CSRF_TOKEN},
                type: 'get',
                url: 'DeleteImage',
                async: true,
                success: function (output) {
                    $('.succClass').show();
                    $('.succClass').css('display', 'block');
                    $('.single-image-wrap').html('');
                    $('#filename').html("Select your file");
                    $('.succClass').html('Image deleted Successfully!');
                    $('#uploadedData').hide();
                }
            });
        } else {
            return false;
        }
    }
    $(document).ready(function (e) {
        $('#submit').submit(function (e) {
            $('.loading_icon').show();
            e.preventDefault();
            $.ajax({
                url: 'img_upload', // point to server-side controller method                
                data: new FormData(this),
                processData: false,
                type: 'post',
                contentType: false,
                dataType:'JSON',
                cache: false,
                async: false,
                success: function (response) {
                    //response = JSON.parse(response);
                    $('.loading_icon').hide();
                    $('.errClass').hide();
                    $('.succClass').hide();                    
                    if (typeof response.success != "undefined") {                        
                        $('#uploadedData').show();
                        $('#uploadedData').html(response.data);
                        $('.succClass').show();
                        $('.succClass').css('display', 'block');
                        $('.succClass').html(response.success);
                        $('.single-image-wrap').html(response.image);
                    }
                    if (typeof response.error != 'undefined') {
                        $('.errClass').show();

                        if (typeof response.dataError != 'undefined') {
                            $('#uploadedData').show();
                            $('#uploadedData').html(response.dataError);
                        }
                        $('.errClass').css('display', 'block');
                        $('.errClass').html(response.error);
                    }
                },
                error: function (response) {
                    $('#msg').html(response); // display error response from the server
                }
            });
        });
    });
</script>

@endsection
