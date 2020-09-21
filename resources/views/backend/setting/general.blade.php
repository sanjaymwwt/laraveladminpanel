
@extends('backend.layouts.app')
@section('title', 'Settings')
@section('content')

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-body with-border">
                <div class="col-md-6">
                    <h4><i class="fa fa-gears"></i> &nbsp; Settings</h4>
                </div>                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"></div>
                <?php $post_hidden_tab = $data['post_hidden_tab']; ?>
                <div class="box-body">
                    <ul class="nav nav-tabs">
                        <li class="general_settings <?= ($post_hidden_tab == "general_settings") ? 'active' : ''; ?> " onclick="tabcliclk('general_settings');" ><a href="#general_settings" data-toggle="tab" class="tab-link-item"><span class="tab-setting-icons"> <i class="fa fa-info"></i> </span> General Settings</a></li>
                        <li class="social_media_links <?= ($post_hidden_tab == "social_media_links") ? 'active' : ''; ?> "  onclick="tabcliclk('social_media_links');"><a href="#social_media_links" data-toggle="tab" class="tab-link-item"><span class="tab-setting-icons"> <i class="fa fa-facebook-f"></i> </span> Social Media Links</a></li>

                        <li class="google_setting <?= ($post_hidden_tab == "google_setting") ? 'active' : ''; ?>" onclick="tabcliclk('google_setting');"><a href="#google_setting" data-toggle="tab" class="tab-link-item"> <span class="tab-setting-icons"> <i class="fa fa-google"></i> </span> Google Setting</a></li> 

                        <li class="email_setting <?= ($post_hidden_tab == "email_setting") ? 'active' : ''; ?>" onclick="tabcliclk('email_setting');"><a href="#email_setting" data-toggle="tab" class="tab-link-item"> <span class="tab-setting-icons"> <i class="fa fa-envelope"></i> </span>Email Setting</a></li> 
                    </ul>

                    {!! Form::open([
                    'route' => 'setting.update_settings',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                    ]) !!}
                    <input type="hidden" name="hidden_tab" value="<?= $post_hidden_tab ?>" id="hidden_tab">
                    <div class="tab-content">
                        <br />

                        <div id="general_settings" class="tab-pane <?= ($post_hidden_tab == "general_settings") ? 'fade active in' : ''; ?> ">

                            <div class="form-group">
                                <label for="subscription_amount" class="col-sm-2 control-label">Logo </label>

                                <div class="col-sm-9">
                                    <input type="file" name="site_logo" class="form-control copyblock_img_input" onchange="readURL(this);" />
                                </div>
                                <div class="col-md-12" id="uploaded_img" style="margin-top:10px; ">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 upload_img_div" id="upload_img_div">
                                        <span class="single-image-wrap">
                                            <?php
                                            if (!empty($data['posts']) && isset($data['posts']['site_logo']) && !empty($data['posts']['site_logo'])) {
                                                $setting_id = '';
                                                if (isset($data['img_setting_id']) && !empty($data['img_setting_id'])) {
                                                    $setting_id = $data['img_setting_id'];
                                                }
                                                ?>
                                            <img src="{{ URL::to('/public') }}<?php echo $data['posts']['site_logo'];?>" alt="" style="max-height: 100px; max-width: 100px; background-color: #ecf0f5" ><span class="delImg" data-id="<?php echo $setting_id; ?>" onclick="deletImage($(this))">X</span>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>



                            <div class="form-group">
                                
                                {!! Form::label('subscription_amount', 'Address Location', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('contact_address', null, ['class' => 'form-control', 'size' => 64,'id' => 'autocomplete_search','placeholder' => 'Search Location (eg: Toronto)' ]) !!}
                                    <input type="hidden" name="lat">
                                    <input type="hidden" name="long">
                                </div>
                            </div>

                            <?php $admin_email = isset($data['posts']['admin_email']) ? $data['posts']['admin_email'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('admin_email', 'Admin Email *', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('admin_email', $admin_email, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('admin_email'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-info pull-right"> Save Changes </button>
                                </div>
                            </div>
                            <div style="clear:both"></div>

                            <!-- <div class="form-group">
                                <label for="good_read_key" class="col-sm-2 control-label">Test</label>

                                <div class="col-sm-9">
                                    <input type="text" name="homepage_settings[twitter_username]" class="form-control" id="good_read_key" value="<?php echo isset($homepage_settings['twitter_username']) ? $homepage_settings['twitter_username'] : ''; ?>" />
                                </div>
                            </div> -->

                        </div>

                        <div id="social_media_links" class="tab-pane <?= ($post_hidden_tab == "social_media_links") ? 'fade active in' : ''; ?>">

                            <?php $fb = isset($data['posts']['facebook_link']) ? $data['posts']['facebook_link'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('facebook_link', 'Facebook ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('facebook_link',$fb, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('facebook_link'); ?></span>
                                </div>
                            </div>
                            <?php $twitterlink = isset($data['posts']['twitter_link']) ? $data['posts']['twitter_link'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('twitter_link', 'Twitter ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('twitter_link', $twitterlink, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('twitter_link'); ?></span>
                                </div>
                            </div>
                            <?php $instralink = isset($data['posts']['instagram_link']) ? $data['posts']['instagram_link'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('instagram_link', 'Instagram ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('instagram_link', $instralink, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('instagram_link'); ?></span>
                                </div>
                            </div>
                            <?php $youtubelink = isset($data['posts']['youtube_link']) ? $data['posts']['youtube_link'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('youtube_link', 'YouTube ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('youtube_link', $youtubelink, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('youtube_link'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-info pull-right"> Save Changes </button>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                        </div>

                        <div id="google_setting" class="tab-pane <?= ($post_hidden_tab == "google_setting") ? 'fade active in' : ''; ?>">

                            <div class="tab-setting-devider"><h4>Google reCAPTCHA Settings</h4></div>
                            
                            <?php $reCAPTCHA_key = isset($data['posts']['reCAPTCHA_key']) ? $data['posts']['reCAPTCHA_key'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('reCAPTCHA_key', 'reCAPTCHA Key ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('reCAPTCHA_key', $reCAPTCHA_key, ['class' => 'form-control', 'size' => 64,'placeholder' => '' ]) !!}                                    
                                </div>
                            </div>
                            <?php $reCAPTCHA_secret = isset($data['posts']['reCAPTCHA_secret']) ? $data['posts']['reCAPTCHA_secret'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('reCAPTCHA_secret', 'reCAPTCHA Secret ', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('reCAPTCHA_secret', $reCAPTCHA_secret, ['class' => 'form-control', 'size' => 64,'placeholder' => '' ]) !!}                                    
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-info pull-right"> Save Changes </button>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                        </div>

                        <div id="email_setting" class="tab-pane <?= ($post_hidden_tab == "email_setting") ? 'fade active in' : ''; ?>">

                            <div class="form-group">
                                <label for="mail_sending_method" class="col-sm-2 control-label">Mail Sending Method <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="mail_sending_method" id="mail_sending_method" class="form-control js-example-basic-single" required="">
                                        <option value="smtp" <?php
                                        if (!empty($data['posts']) && isset($data['posts']['mail_sending_method']) && $data['posts']['mail_sending_method'] == 'smtp') {
                                            echo 'selected';
                                        }
                                        ?>> SMTP </option>
                                        <option value="php_mail" <?php
                                        if (!empty($data['posts']) && isset($data['posts']['mail_sending_method']) && $data['posts']['mail_sending_method'] == 'php_mail') {
                                            echo 'selected';
                                        }
                                        ?>> PHP Mail </option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="smtp box-mail">
                                <?php $smtphost = isset($data['posts']['smtp_host']) ? $data['posts']['smtp_host'] : ''; ?>
                                <div class="form-group"> 
                                    {!! Form::label('smtp_host', 'SMTP Host *', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('smtp_host', $smtphost, ['class' => 'form-control', 'size' => 64, ]) !!}
                                        <span class="error"><?php echo $errors->first('smtp_host'); ?></span>
                                    </div>
                                </div>
                                <?php $smtpport = isset($data['posts']['smtp_port']) ? $data['posts']['smtp_port'] : ''; ?>
                                <div class="form-group"> 
                                    {!! Form::label('smtp_port', 'SMTP Port *', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('smtp_port', $smtpport, ['class' => 'form-control', 'size' => 64, ]) !!}
                                        <span class="error"><?php echo $errors->first('smtp_port'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="smtp_tls_ssl_opt" class="col-sm-2 control-label">Select SMTP TLS/SSL <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="smtp_tls_ssl_opt" id="smtp_tls_ssl_opt" class="form-control js-example-basic-single" required="">
                                            <option value="tls" <?php
                                            if (!empty($data['posts']) && isset($data['posts']['smtp_tls_ssl_opt']) && $data['posts']['smtp_tls_ssl_opt'] == 'tls') {
                                                echo 'selected';
                                            }
                                            ?>> TLS </option>
                                            <option value="ssl" <?php
                                            if (!empty($data['posts']) && isset($data['posts']['smtp_tls_ssl_opt']) && $data['posts']['smtp_tls_ssl_opt'] == 'ssl') {
                                                echo 'selected';
                                            }
                                            ?>> SSL </option>
                                        </select>
                                    </div>
                                </div>
                                <?php $smtpuser = isset($data['posts']['smtp_user']) ? $data['posts']['smtp_user'] : ''; ?>
                                <div class="form-group"> 
                                    {!! Form::label('smtp_user', 'SMTP Username *', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('smtp_user', $smtpuser, ['class' => 'form-control', 'size' => 64, ]) !!}
                                        <span class="error"><?php echo $errors->first('smtp_user'); ?></span>
                                    </div>
                                </div>
                                <?php $smtppass = isset($data['posts']['smtp_pass']) ? $data['posts']['smtp_pass'] : ''; ?>
                                <div class="form-group"> 
                                    {!! Form::label('smtp_pass', 'SMTP Password *', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('smtp_pass', $smtppass, ['class' => 'form-control', 'size' => 64, ]) !!}
                                        <span class="error"><?php echo $errors->first('smtp_pass'); ?></span>
                                    </div>
                                </div>                               
                            </div>
                            <?php $smtpfrom = isset($data['posts']['smtp_mail_from']) ? $data['posts']['smtp_mail_from'] : ''; ?>
                            <div class="form-group"> 
                                {!! Form::label('smtp_mail_from', 'Mail From *', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('smtp_mail_from', $smtpfrom, ['class' => 'form-control', 'size' => 64, ]) !!}
                                    <span class="error"><?php echo $errors->first('smtp_mail_from'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-info pull-right"> Save Changes </button>
                                </div>
                            </div>
                            <hr style="border-color:#ececec;"/>
                            <h4><b> Test Email</b></h4>

                            <div class="form-group"> 
                                {!! Form::label('test_to_mail', ' Mail To', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('test_to_mail', null, ['class' => 'form-control', 'size' => 64, ]) !!}                                    
                                </div>
                            </div>
                            <div class="form-group"> 
                                {!! Form::label('test_subject', ' Subject', ['class' => 'col-sm-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('test_subject', null, ['class' => 'form-control', 'size' => 64, ]) !!}                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="test_email_body" class="col-sm-2 control-label"> Body </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="2" id="test_message" name="test_email_body"> <p>Hello,</p>
                                    <p>This is Test message</p>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-info pull-right"> Send Test Mail </button>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</section>

<!-- change smtp and phpmail option start -->
<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('change', '#mail_sending_method', function () {

            if ($(this).val() == "smtp") {
                $(".box-mail").hide();
                $(".smtp").show();
            }
            if ($(this).val() == "php_mail") {
                $(".box-mail").hide();
                $(".php_mail").show();
            }
        });

        $('#mail_sending_method').trigger('change');
    });
</script>
<!-- change smtp and phpmail option end -->
<script>
    function tabcliclk(valuetab) {
        document.getElementById("hidden_tab").value = valuetab;
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo isset($data['settings']) ? $data['settings']['google_api_key'] : ''; ?>&amp;libraries=places"></script>

<script>
    google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
        var input = document.getElementById('autocomplete_search');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            $('#lat').val(place.geometry['location'].lat());
            $('#long').val(place.geometry['location'].lng());
        });
    }
</script>

<!-- Return active li class result -->

<?php $data['request']->session()->forget('hidden_tab_session'); ?>
<!-- unset session after success -->

<script src="{{ asset('resources/assets/plugins/ckeditor_new/ckeditor.js') }}" ></script>
<link href="{{ asset('resources/assets/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet"  >
<script src="{{ asset('resources/assets/bower_components/select2/dist/js/select2.min.js') }}" ></script>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        get_editor('test_message');
    });
    // In edit mode unlink image and delete image here
    function deletImage(e) {
        if (confirm("Are you sure want to delete this Image?")) {
            id = e.attr('data-id');
            $.ajax({
                data: {id: id, _token: CSRF_TOKEN},
                type: 'post',
                url: 'setting/DeleteImage',
                async: true,
                success: function (output) {
                    $("#event_image").val('');
                    $("#upload_img_div").html('');
                    window.location.reload();
                }
            });
        } else {
            return false;
        }
    }
</script>
<!-- select2 js search end -->


@endsection

