
function get_editor(id) {

    idArr = $.isArray(id);     // check array or not
    if (idArr) {
        var data_length = id.length;
        console.log(id.length);
        if (data_length > 0) {
            $.each(id, function (key, value) {
                CKEDITOR.replace(value, {
                    filebrowserUploadUrl: editor_filebrowserUploadUrl,
                    filebrowserImageUploadUrl: editor_filebrowserUploadUrl,
                    allowedContent: true,
                });
            });

        }
    } else { // check for single value
        CKEDITOR.replace(id, {
            filebrowserUploadUrl: editor_filebrowserUploadUrl,
            filebrowserImageUploadUrl: editor_filebrowserUploadUrl,
            allowedContent: true,
        });
    }
}

function readURL(input, img_no = '') {
    console.log(input);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var img_changed_id = '';
            console.log(input.name);
            if (img_no != '') {
                img_changed_id = "uploaded_img" + img_no;
            } else {
                img_changed_id = 'uploaded_img';
            }
            console.log(img_changed_id);
            html = '<span class="single-image-wrap" id="single-image-wrap' + img_no + '" ><img src="' + e.target.result + '" id="event_image" class="uploaded-images" alt="" style="width: 200px;height: 200px;"><span class="delImg" onclick="hideImage($(this),' + img_no + ')">X</span></span>';
            $('#' + img_changed_id).show();
            $('#' + img_changed_id).find('.upload_img_div').html(html);
        }
        reader.readAsDataURL(input.files[0]);
}
}
function readGelleryURL(input, img_no = '') {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image_number = '';
            var img_changed_id = '';
            if (img_no != '') {
                image_number = img_no;
                //input.name.next( "#uploaded_img" ).attr( "id", "uploaded_img"+image_number);
                img_changed_id = "uploaded_img" + image_number;
            } else {
                img_changed_id = 'uploaded_img';
            }

            $('#' + img_changed_id).show();
            $('#' + img_changed_id).find('.upload_img_div').html('<img src="' + e.target.result + '" class="uploaded-images" style="width: 100%;height: 90%;">');
        }
        reader.readAsDataURL(input.files[0]);
}
}
function hideImage(eObj, img_no = '') {
    $("#single-image-wrap" + img_no).remove('');
    $(".copyblock_img_input" + img_no).val('');
    $("#filename").html('Select your file');
}





