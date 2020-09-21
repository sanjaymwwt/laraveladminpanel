
@extends('backend.layouts.app')
@section('content')
<style type="text/css">
    .invoice p{
        line-height: 1em;
    }
    .invoice h2{
        text-transform: uppercase;
    }
    .invoice-info{
        padding-bottom: 50px;
    }
    .invoice-info strong{
        padding-right: 50px;
        text-transform: capitalize;
    }
    .invoice-text{
        position: relative;
        background: #fff;
        border: 1px solid #f4f4f4;
        padding: 20px;
        /* margin: 10px 25px; */
        margin-bottom: 10px;
        margin-left: 15px;
        margin-right: 15px;
    }
    .invoice-text1{
        position: relative;
        background: #fff;
        border: 1px solid #f4f4f4;
        padding: 20px;
        margin-left: 15px;
        margin-right: 15px;

        /* margin: 10px 25px; */

    }    
    .billing{
        background-color: #51b4db;
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        padding: 10px 0px 10px 10px;
        text-transform: uppercase;
    }
    .items_detail th{
        background-color: #51b4db;
        color: #fff;
        text-transform: uppercase;
    }    
</style>

<!-- Content Header (Page header) -->
<div class="alert alert-dismissible msg" style='display:none;'>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>                            
</div>
<?php $invoice_detail = (array) $data['invoice_detail'][0]; ?>
<!-- invoice start-->
<section class="invoice-text">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">  
                <a href="{{ route('invoices') }}" class="btn btn-success"><i class="fa fa-list"></i> Back To Invoice List</a>    
                <?php if (in_array('edit', $data['users_rights'])) { ?>
                    <a href="{{ route('invoices.edit_invoice',$invoice_detail['id']) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit Invoice</a>
                <?php } ?>
                <a class="btn btn-primary create_pdf" 
                   href="{{ route('invoices.invoice_pdf_download',$invoice_detail['id']) }}"><i class="fa fa-download"></i> Download</a>

                <a class="btn btn-danger emailView" id="<?php echo $invoice_detail['id']; ?>" data-toggle="modal" href="#email"><i class="fa fa-envelope"></i> Send Email</a>

            </div>	
        </div>
    </div>

</section>

<section class="invoice-text" id="printableArea">

    <div class="row invoice-info">
        <div class="col-md-6">
            <h1>Company Logo</h1>
        </div>
        <div class="col-md-4 text-right pull-right ">
            <h2>Invoice</h2>
            <p><strong>INVOICE ID : </strong> <?= strtoupper($invoice_detail['invoice_no']); ?> </p>
            <p><strong>BILLING DATE : </strong> <?= strtoupper($invoice_detail['created_date']); ?> </p>
            <p><strong>DUE DATE : </strong> <?= strtoupper($invoice_detail['due_date']); ?> </p>
        </div>
    </div>	  

    <table class="table table-striped table-hover items_detail">
        <tbody>
            <tr>
                <td class="billing">Billing To</td>
                <td class="billing">Billing From</td>
            </tr>
            <tr>
                <td><strong> <?= $invoice_detail['firstname'] . ' ' . $invoice_detail['lastname']; ?></strong></td>
                <td><strong> <?= $invoice_detail['company_name'] ?></strong></td>
            </tr>
            <tr>
                <td> <?= $invoice_detail['client_address']; ?> </td>
                <td> <?= $invoice_detail['company_address1']; ?> </td>
            </tr>
            <tr>
                <td> <?= $invoice_detail['client_email']; ?></td>
                <td> <?= $invoice_detail['company_email']; ?></td>
            </tr>

            <tr>
                <td> <?= $invoice_detail['client_mobile_no']; ?></td>
                <td> <?= $invoice_detail['company_mobile_no']; ?></td>
            </tr>
            </tr>

            </div>

        </tbody>
    </table>
    <table class="table table-striped table-hover items_detail">
        <thead>
            <tr>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $items_detail = unserialize($invoice_detail['items_detail']); ?>
            <?php if (!empty($items_detail)) { ?>
                <?php foreach ($items_detail as $val) { ?>
                    <tr>
                        <td><?= $val['product_description']; ?></td>
                        <td><?= $val['quantity']; ?></td>
                        <td><?= $val['price']; ?></td>
                        <td><?= $val['tax']; ?></td>
                        <td><?= $val['total']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-6 pull-right">
            <div class="table-responsive">
                <table class="table">
                    <tbody><tr>
                            <th style="width:50%">Subtotal:</th>
                            <td><?= $invoice_detail['sub_total']; ?></td>
                        </tr>
                        <tr>
                            <th>Tax</th>
                            <td><?= $invoice_detail['total_tax']; ?></td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td><?= $invoice_detail['discount']; ?></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><?= $invoice_detail['grand_total'] . ' ' . $invoice_detail['currency']; ?></td>
                        </tr>
                    </tbody></table>
            </div>
        </div>	

    </div>
    <div class="row">
        <div class="col-md-12" style="padding-top:30px;">
            <p>Client Note:</p>
            <p style="color:#8f8f8f; font-size:12px;">
                <?= $invoice_detail['client_note']; ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding-top:30px;">
            <p>Terms and Condition:</p>
            <p style="color:#8f8f8f; font-size:12px;">
                <?= $invoice_detail['termsncondition']; ?>
            </p>
        </div>
    </div>



</section>

<!-- invoice end-->	  

<section class="invoice-text1">
    <div class="row">
        <div class="col-md-12"> 
            <div class="pull-left">                
                <button type="button"  class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>
            </div>
            <div class="pull-right">  
                <a href="{{ route('invoices') }}" class="btn btn-success"><i class="fa fa-list"></i> Back To Invoice List</a>    
                <?php if (in_array('edit', $data['users_rights'])) { ?>
                    <a href="{{ route('invoices.edit_invoice',$invoice_detail['id']) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit Invoice</a>
                <?php } ?>
                <a class="btn btn-primary create_pdf" 
                   href="{{ route('invoices.invoice_pdf_download',$invoice_detail['id']) }}"><i class="fa fa-download"></i> Download</a>

                <a class="btn btn-danger emailView" id="<?php echo $invoice_detail['id']; ?>" data-toggle="modal" href="#email"><i class="fa fa-envelope"></i> Send Email</a>

            </div>	
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Compose</h4> <!-- NaumaNJunaiD#007 -->
            </div>
            <div class="modal-body">
                <form class="form-horizontal email-from" role="form" id="validateFrm">
                    {!! Form::token() !!}
                    <div class="form-group">
                        <label  class="col-md-2 control-label">To <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $invoice_detail['client_email']; ?>" placeholder="">
                            <input type="hidden" class="form-control" id="file" name="file">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-2 control-label">Cc / Bcc</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="cc" name="cc" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Subject <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="subject" name="subject" value="Admin Lite Invoice" placeholder="">                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Message <span class="text-danger">*</span></label>
                        <div class="col-md-10">
                            <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <span class="btn green fileinput-button">                                
                                <span><a href="" id="pdf_url" target="_blank"></a></span>
                            </span>
                            <button type="submit" class="btn btn-send sendEmail">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="{{ asset('resources/assets/bootstrap/js/jquery.validate.min.js') }}" ></script>
<script type="text/javascript">
                    function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    }
</script>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // Create pdf js function
    $('.emailView').click(function (e) {
    var id = $('.emailView').attr('id');
    var post_data = {
    _token: CSRF_TOKEN,
            'id' : id
    };
    $.ajax({
    type: "POST",
            url: '{{ route('invoices.create_pdf')}}',
            data: post_data,
            success: function (response) {
            console.log(response);
            if (response != '') {
            $("#pdf_url").attr("href", response);
            var index = response.lastIndexOf("/") + 1;
            var filename = response.substr(index);
            var icon = "<i class='fa fa-plus fa fa-white'></i>";
            $("#pdf_url").html(icon + ' ' + filename);
            $("#file").val(filename);
            }
            }
    });
    });
    function sendEmail() {
    $.ajax({
    type: 'POST',
            url: '{{ route('invoices.send_email_with_invoice')}}',
            data: $(".email-from").serialize(),
            beforeSend: function () {
            $(".sendEmail").attr('disabled', true);
            $(".sendEmail").html('<i class="fa fa-spinner fa-pulse"></i>');
            },
            success: function (response) {
            console.log(response);
            response = JSON.parse(response);
            //alert(response);
            $('.alert').removeClass('alert-success');
            $('.alert').removeClass('alert-danger');
            console.log(response.success);
            if (typeof response.success !== 'undefined') {
            console.log('asdv');
            $(".sendEmail").attr('disabled', false);
            $(".sendEmail").html('Send');
            $(".email-from").trigger('reset');
            $('.close').trigger('click');
            location.reload();
            //$('#email').modal('hide');
            }
            if (typeof response.error !== 'undefined') {
            $(".sendEmail").attr('disabled', false);
            $('.close').trigger('click');
            location.reload();
            }
            }

    });
    }
    $(document).ready(function () {

    $('form[id="validateFrm"]').validate({
    rules: {
    message: 'required',
            subject: 'required',
            email: {
            required: true,
                    email: true,
            },
    },
            messages: {
            message: ' Email Body is required',
                    email: 'Email is required',
                    subject: 'Subject is required',
            },
            submitHandler: function (form) {
            sendEmail();
            }
    });
    });
    function removePopup() {
    $('#email').removeClass('fade in')
            .addClass('fade').css('display', 'none');
    $('#email').attr('aria-hidden', 'true');
    }



</script>
<script>
    $('#invoices').addClass('active');
</script>


@endsection