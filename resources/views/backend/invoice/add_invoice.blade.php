@extends('backend.layouts.app')
@section('content')

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('resources/assets/plugins/datepicker/datepicker3.css') }}">

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-plus"></i> &nbsp; <?php echo $data['title']; ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('invoices')}}" class="btn btn-success"><i class="fa fa-list"></i> Invoice List</a>
                </div>

            </div>
        </div>
    </div>  

    <div class="row">
        <?php if ($data['id'] == '') { ?>

            {{ Form::open(['route' => ['invoices.store'],  'method' => 'POST','class' => 'invoiceFrm','id' =>'invoiceFrm']) }} 
        <?php } else { ?>
           
            <?php $form_details = $data['form_details'];?>
            {{ Form::open(['route' => ['invoices.update', $form_details['id']],  'method' => 'POST','class' => 'invoiceFrm','id' =>'invoiceFrm']) }} 

        <?php }
        ?>

        <input type="hidden" name="company_id" value="<?php echo isset($form_details) ? $form_details['company_id'] : ''; ?>" >
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">BILL From</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group"> 
                        {!! Form::label('company_name', 'Company Name', ['class' => 'control-label']) !!}
                        
                            <?php
                            $companyname = '';
                            if (isset($form_details['company_name']) && !empty($form_details['company_name'])) {
                                $companyname = $form_details['company_name'];
                            }
                            ?>
                            {!! Form::text('company_name', $companyname, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Company Name' ]) !!}
                            <span class="error"><?php echo $errors->first('company_name'); ?></span>
                        
                    </div>

                    <div class="form-group"> 
                        {!! Form::label('company_address_1', 'Address Line1', ['class' => 'control-label']) !!}
                        
                            <?php
                            $companyaddress1 = '';

                            if (isset($form_details['company_address1']) && !empty($form_details['company_address1'])) {
                                $companyaddress1 = $form_details['company_address1'];
                            }
                            ?>
                            {!! Form::text('company_address_1', $companyaddress1, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Address Line1' ]) !!}
                            <span class="error"><?php echo $errors->first('company_address_1'); ?></span>
                        
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('company_address_2', 'Address Line2', ['class' => 'control-label']) !!}
                        
                            <?php
                            $companyaddress2 = '';

                            if (isset($form_details['company_address2']) && !empty($form_details['company_address2'])) {
                                $companyaddress2 = $form_details['company_address2'];
                            }
                            ?>
                            {!! Form::text('company_address_2', $companyaddress2, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Address Line2' ]) !!}
                            <span class="error"><?php echo $errors->first('company_address_2'); ?></span>
                        
                    </div>
                    
                    <div class="form-group"> 
                        {!! Form::label('company_email', 'Company Email', ['class' => 'control-label']) !!}
                        
                            <?php
                            $companyemail = '';

                            if (isset($form_details['company_email']) && !empty($form_details['company_email'])) {
                                $companyemail = $form_details['company_email'];
                            }
                            ?>
                            {!! Form::text('company_email', $companyemail, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Email' ]) !!}
                            <span class="error"><?php echo $errors->first('company_email'); ?></span>
                        
                    </div>

                    <div class="form-group"> 
                        {!! Form::label('company_mobile_no', 'Company Mobile No', ['class' => ' control-label']) !!}
                        
                            <?php
                            $companyphone = '';

                            if (isset($form_details['company_mobile_no']) && !empty($form_details['company_mobile_no'])) {
                                $companyphone = $form_details['company_mobile_no'];
                            }
                            ?>
                            {!! Form::text('company_mobile_no', $companyphone, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Mobile No' ]) !!}
                            <span class="error"><?php echo $errors->first('company_mobile_no'); ?></span>
                        
                    </div>
                    
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">BILL TO</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                    <div class="form-group"> 
                        {!! Form::label('user_id', 'Customer', ['class' => 'control-label']) !!}
                                               
                            <?php 
                            $cusSal = isset($form_details['client_id']) ? $form_details['client_id'] : -1;
                            $optionArr = array();
                            $optionArr[''] = " -- Select Customer -- ";
                            
                            foreach ($data['customer_list'] as $client) {
                                $client = (array) $client;
                                $optionArr[$client['id']] = $client['firstname'] .' '. $client['lastname'];
                            }
                            echo Form::select('user_id', $optionArr, $cusSal, array('class' => 'form-control','id' => 'customer')); ?>
                            <span class="error"><?php echo $errors->first('user_id'); ?></span>
                        
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('firstname', 'First Name', ['class' => 'control-label']) !!}
                        
                            <?php
                            $firstname = '';

                            if (isset($form_details['firstname']) && !empty($form_details['firstname'])) {
                                $firstname = $form_details['firstname'];
                            }
                            ?>
                            {!! Form::text('firstname', $firstname, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'First Name' ]) !!}
                            <span class="error"><?php echo $errors->first('firstname'); ?></span>
                        
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                        
                            <?php
                            $add = '';

                            if (isset($form_details['client_address']) && !empty($form_details['client_address'])) {
                                $add = $form_details['client_address'];
                            }
                            ?>
                            {!! Form::text('client_address', $add, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Address' ]) !!}
                            <span class="error"><?php echo $errors->first('client_address'); ?></span>
                        
                    </div>
                    
                    <div class="form-group"> 
                        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                        
                            <?php
                            $clientemail = '';
                            if (isset($form_details['client_email']) && !empty($form_details['client_email'])) {
                                $clientemail = $form_details['client_email'];
                            }
                            ?>
                            {!! Form::text('email', $clientemail, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Email' ]) !!}
                            <span class="error"><?php echo $errors->first('email'); ?></span>
                        
                    </div>
                    
                    <div class="form-group"> 
                        {!! Form::label('mobile_no', 'Mobile No', ['class' => 'control-label']) !!}
                        
                            <?php
                            $clientphone = '';
                            if (isset($form_details['client_mobile_no']) && !empty($form_details['client_mobile_no'])) {
                                $clientphone = $form_details['client_mobile_no'];
                            }
                            ?>
                            {!! Form::text('mobile_no', $clientphone, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'Mobileno' ]) !!}
                            <span class="error"><?php echo $errors->first('mobile_no'); ?></span>
                        
                    </div>
                                      
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="col-md-3">
                        
                        <div class="form-group">
                            <label for="invoice_no" class="control-label">Invoice#</label>
                            <?php
                            $invoiceno = '';
                            if (isset($form_details['invoice_no']) && !empty($form_details['invoice_no'])) {
                                $invoiceno = $form_details['invoice_no'];
                            }
                            ?>
                            {!! Form::text('invoice_no', $invoiceno, ['class' => 'form-control', 'size' => 64, 'placeholder' => 'eg. Inv-1001' ]) !!}                            
                            <span class="error"><?php echo $errors->first('invoice_no'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date" class="control-label">Billing Date</label>
                            <?php
                            $date = '';
                            if (isset($form_details['created_date']) && !empty($form_details['created_date'])) {
                                $date = date('m/d/Y', strtotime($form_details['created_date']));
                            }
                            ?>
                            {!! Form::text('billing_date', $date, ['class' => 'form-control datepicker', 'size' => 64, 'placeholder' => 'Billing Date' ]) !!}                                                                                    
                            <span class="error"><?php echo $errors->first('billing_date'); ?></span>
                        </div>
                    </div>                   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date" class="control-label">Due Date</label>
                            <?php
                            $date = '';
                            if (isset($form_details['due_date']) && !empty($form_details['due_date'])) {
                                $date = date('m/d/Y', strtotime($form_details['due_date']));
                            }
                            ?>
                            {!! Form::text('due_date', $date, ['class' => 'form-control datepicker', 'size' => 64, 'placeholder' => 'Due Date' ]) !!}                                                                                    
                            <span class="error"><?php echo $errors->first('due_date'); ?></span>                            
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>
                            <?php
                            $optionSal = isset($form_details['payment_status']) ? $form_details['payment_status'] : -1;
                            $optionArr = array();
                            $status = array(
                                array('id' => 'Unpaid', 'val' => 'Unpaid'),
                                array('id' => 'Partially Paid', 'val' => 'Partially Paid'),
                                array('id' => 'Paid', 'val' => 'Paid'),
                                array('id' => 'Overdue', 'val' => 'Overdue'),
                            );
                            foreach ($status as $val) {

                                $optionArr[$val['id']] = $val['val'];
                            }
                            echo Form::select('payment_status', $optionArr, $optionSal, array('class' => 'form-control','id' => '')); 
                            ?>                            
                            <span class="error"><?php echo $errors->first('payment_status'); ?></span>        
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th width="40%">Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="field_wrapper">
                            <?php if ($data['id'] == '') { ?>
                                <tr class="item">
                                    <td>
                                        <a href="javascript:void(0);" class="add_button btn btn-sm btn-primary" title="Add field"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="Description" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="quantity[]" value="1" class="form-control calcEvent quantity" id="quantity" placeholder="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="price[]" class="form-control calcEvent price" id="price" placeholder="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="tax[]" class="form-control calcEvent tax" id="tax" placeholder="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="total[]" class="form-control calcEvent item_total" placeholder="" required>
                                        <strong class="item_total">0.00</strong>
                                    </td>

                                </tr>
                                <?php
                            } else {
                                if (isset($form_details['items_detail']) && !empty($form_details['items_detail'])) {
                                    $items_detail = unserialize($form_details['items_detail']);
                                    foreach ($items_detail as $key => $val) {
                                        if ($key == 0) {
                                            $class = 'fa fa-plus';
                                            $btnClass = 'add_button';
                                            $btnColorClass = 'btn-primary';
                                            $btnField = 'Add field';
                                        } else {
                                            $class = 'fa fa-minus';
                                            $btnClass = "remove_button";
                                            $btnColorClass = "btn-danger";
                                            $btnField = "Remove field";
                                        }
                                        ?>
                                        <tr class="item">
                                            <td>
                                                <a href="javascript:void(0);" class="<?php echo $btnClass; ?> btn btn-sm <?php echo $btnColorClass; ?>" title="<?php echo $btnField; ?>"><i class="<?php echo $class; ?>"></i></a>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="product_description[]" value="<?php echo $val['product_description'] ?>" class="form-control calcEvent" id="product_description" placeholder="Description" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="quantity[]" value="<?php echo $val['quantity'] ?>"  class="form-control calcEvent quantity" id="quantity" placeholder="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="price[]" value="<?php echo $val['price'] ?>"  class="form-control calcEvent price" id="price" placeholder="" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="tax[]" value="<?php echo $val['tax'] ?>" class="form-control calcEvent tax" id="tax" placeholder="" required>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="hidden" name="total[]"  class="form-control calcEvent item_total" value="<?php echo $val['total'] ?>" placeholder="" required>
                                                <strong class="item_total"><?php echo $val['total'] ?></strong>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="col-md-5 pull-right">
                        <table class="table">
                            <tr>
                                <th><strong>Sub Total: </strong></th>
                            <input type="hidden" name="sub_total" class="sub_total" value="<?php echo isset($form_details['sub_total']) ? $form_details['sub_total'] : '0.00'; ?>">
                            <td class="text-right"><span class="sub_total"><?php echo isset($form_details['sub_total']) ? $form_details['sub_total'] : '0.00'; ?></span></td>
                            </tr>
                            <tr>
                                <th><strong>Tax: </strong></th>
                            <input type="hidden" name="total_tax" class="total_tax" value="<?php echo isset($form_details['total_tax']) ? $form_details['total_tax'] : '0.00'; ?>">
                            <td class="text-right"><span class="total_tax"><?php echo isset($form_details['total_tax']) ? $form_details['total_tax'] : '0.00'; ?></span></td>
                            </tr>
                            <tr>
                                <th><strong>Discount: </strong></th>
                                <td class="text-right"><div class="form-group">
                                        <input type="text" name="discount" class="form-control calcEvent pull-right input-sm discount" id="discount" value="<?php echo isset($form_details['discount']) ? $form_details['discount'] : '0.00'; ?>" placeholder=""  style="width: 40%">
                                    </div></td>
                            </tr>
                            <tr>
                            <input type="hidden" name="grand_total" class="grand_total" value="<?php echo isset($form_details['grand_total']) ? $form_details['grand_total'] : '0.00'; ?>">
                            <th><strong>Total: </strong></th>
                            <td class="text-right"><span id="grand_total"><?php echo isset($form_details['grand_total']) ? $form_details['grand_total'] : '0.00'; ?></span></td>
                            </tr>
                        </table>
                    </div>  


                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="invoice_no" class="control-label">Client Note</label>
                        <textarea name="client_note" class="form-control" rows="2" placeholder="" ><?php echo (isset($form_details['client_note'])) ? $form_details['client_note'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="invoice_no" class="control-label">Terms & Condition</label>
                        <textarea name="termsncondition" class="form-control" rows="3" placeholder="" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <input type="submit" name="submit" value="<?php echo $data['btn_title']; ?>" class="btn btn-primary pull-right">
                </div>
            </div>
        </div>


        {!! Form::close() !!}

    </div>  

</section> 



<!-- bootstrap datepicker -->
<script src="{{ asset('resources/assets/plugins/datepicker/bootstrap-datepicker.js') }}" ></script>
<script src="{{ asset('resources/assets/bootstrap/js/jquery.validate.min.js') }}" ></script>
<script>
$('.datepicker').datepicker({
    autoclose: true,
    fromat: 'dd/mm/yyyy',
});
</script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
         step_remove_url = $("#remove-step-form").attr('action');
        //---------------------------------------------------------------
        $('#customer').change(function (e) {
            var id = $('#customer').val();
            if (id != '') {
                var post_data = {
                    _token: CSRF_TOKEN,
                    'id' : id
                };
                $.ajax({
                    type: 'POST',                    
                    url: '{{ route('invoices.customer_detail')}}',
                    data: post_data,
                    success: function (response) {
                        var data = JSON.parse(response);
                        console.log(data.id);
                        $('#firstname').val(data.firstname);
                        $('#client_address').val(data.address);
                        $('#email').val(data.email);
                        $('#mobile_no').val(data.mobile_no);
                        $('#firstname').removeClass('error');
                        $('#client_address').removeClass('error');
                        $('#email').removeClass('error');
                        $('#mobile_no').removeClass('error');
                        $('#firstname-error').hide();
                        $('#client_address-error').hide();
                        $('#email-error').hide();
                        $('#mobile_no-error').hide();
                    }
                });
            } else {
                $('#firstname').val('');
                $('#client_address').val('');
                $('#email').val('');
                $('#mobile_no').val('');
            }

        });

        //---------------------------------------------------------------
        $(document).on("click change paste keyup", ".calcEvent", function () {
            calculate_total();
        });

        var max_field = 10;
        var add_button = $('.add_button');
        var wrapper = $('.field_wrapper');
        var html_fields = '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="Description" required> </div> </td> <td> <div class="form-group"> <input type="text" name="quantity[]" value="1" class="form-control calcEvent quantity" id="quantity" placeholder=""> </div> </td> <td> <div class="form-group"> <input type="text" name="price[]" class="form-control calcEvent price" id="price" placeholder="" required> </div> </td> <td> <div class="form-group"> <input type="text" name="tax[]" class="form-control calcEvent tax" id="tax" placeholder="" required> </div> </td> <td> <input type="hidden" name="total[]" class="form-control calcEvent item_total" placeholder="" required><strong class="item_total">0.00</strong> </td> </tr>';

        var x = 1; // 

        $(add_button).click(function () {
            if (x < max_field) {
                x++;
                $(wrapper).append(html_fields);
                load_jquery();
            }

        });

        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();

            $(this).closest('tr').remove(); //Remove field html
            x--; //Decrement field counter
            calculate_total();
        });

    });


    //---------------------------------------------------------------
    function calculate_total() {

        var sub_total = 0;
        var total = 0;
        var amountDue = 0;
        var total_tax = 0;

        $('tr.item').each(function () {
            var quantity = parseFloat($(this).find(".quantity").val());
            var price = parseFloat($(this).find(".price").val());
            var item_tax = $(this).find(".tax").val();

            var item_total = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0;
            sub_total += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
            total_tax += parseFloat(price * quantity * item_tax / 100) > 0 ? parseFloat(price * quantity * item_tax / 100) : 0;

            $(this).find('.item_total').text(item_total.toFixed(2));
            $(this).find('.item_total').val(item_total.toFixed(2));
        });

        var discount = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
        total += parseFloat(sub_total + total_tax - discount);

        $('.sub_total').text(sub_total.toFixed(2));
        $('.sub_total').val(sub_total.toFixed(2)); // for hidden field

        $('.total_tax').text(total_tax.toFixed(2));
        $('.total_tax').val(total_tax.toFixed(2)); // for hidden field

        $('#grand_total').text(total.toFixed(2));
        $('.grand_total').val(total.toFixed(2)); // for hidden field

    }

</script>

<script>
    $('#invoices').addClass('active');
    $(document).ready(function () {

        $('form[id="invoiceFrm"]').validate({
            rules: {
                company_name: 'required',
                company_address_1: 'required',
                company_address_2: 'required',
                company_mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 12,
                    number: true
                },
                quantity: {
                    required: true,
                    number: true
                },
                user_id: 'required',
                firstname: 'required',
                client_address: 'required',
                mobile_no: 'required',
                billing_date: 'required',
                email: {
                    required: true,
                    email: true,
                },
//                psword: {
//                    required: true,
//                    minlength: 8,
//                }
            },
//            messages: {
//                fname: 'This field is required',
//                lname: 'This field is required',
//                user_email: 'Enter a valid email',
//                psword: {
//                    minlength: 'Password must be at least 8 characters long'
//                }
//            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        $(".quantity").on("keypress keyup blur", function (evt) {
//            $(this).val($(this).val().replace(/[^\d].+/, ""));
//            if ((event.which < 48 || event.which > 57)) {
//                event.preventDefault();
//            }
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".price").on("keypress keyup blur", function (evt) {
//            $(this).val($(this).val().replace(/[^\d].+/, ""));
//            if ((event.which < 48 || event.which > 57)) {
//                event.preventDefault();
//            }
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".tax").on("keypress keyup blur", function (evt) {
//            $(this).val($(this).val().replace(/[^\d].+/, ""));
//            if ((event.which < 48 || event.which > 57)) {
//                event.preventDefault();
//            }
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".discount").on("keypress keyup blur", function (evt) {
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ''));

            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
    });
    function load_jquery() {
        $(".quantity").on("keypress keyup blur", function (evt) {
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".price").on("keypress keyup blur", function (evt) {
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".tax").on("keypress keyup blur", function (evt) {
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ""));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
        $(".discount").on("keypress keyup blur", function (evt) {
            self = $(this);
            $(this).val($(this).val().replace(/[^0-9\.]/g, ''));

            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
            {
                evt.preventDefault();
            }
        });
    }
</script>


@endsection
