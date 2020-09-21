
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Document</title>
        
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/mpdfstyletables.css') }}">
    </head>
    <body>
        <section>
            <table border="" style="width: 100%">
                <tbody>
                    <tr>
                        <td width="60%"><h3>Company Logo</h3></td>
                        <td>
                            <h3>INVOICE</h3>
                            <h4>INVOICE ID : <?php echo strtoupper($invoice_detail['invoice_no']); ?></h4>
                            <h4>BILLING DATE : <?php echo strtoupper($invoice_detail['created_date']); ?></h4>
                            <h4>DUE DATE : <?php echo strtoupper($invoice_detail['due_date']); ?></h4>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="invoice" border="" style="width: 100%">
                <tbody>
                    <tr >
                        <th style="margin-right:1mm">
                            <p>Billing To</p>
                        </th>
                        <th>
                            <p>Billing From</p>
                        </th>
                    </tr>
                    <tr>		
                        <td>
                            <p><strong><?php echo ucwords($invoice_detail['firstname'] . '' . $invoice_detail['lastname']) ?> </strong></p>
                            <p><?php echo $invoice_detail['client_address']; ?> </p>
                            <p> <?php echo $invoice_detail['client_email']; ?> </p>
                            <p> <?php echo $invoice_detail['client_mobile_no']; ?>  </p>
                        </td>
                        <td>
                            <p><strong><?php echo ucfirst($invoice_detail['company_name']); ?> </strong></p>
                            <p> <?php echo $invoice_detail['company_address1']; ?> </p>
                            <p> <?php echo $invoice_detail['company_email']; ?> </p>
                            <p><?php echo $invoice_detail['company_mobile_no']; ?> </p>
                        </td>
                    </tr>	
                </tbody>
            </table>


            <table class="invoice" border="" style="width: 100%">
                <thead>
                    <tr class="">
                        <th>Product Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $items_detail = unserialize($invoice_detail['items_detail']);
                    foreach ($items_detail as $val) {
                        ?>
                        <tr class="oddrow">
                            <td><?php echo $val['product_description']; ?> </td>
                            <td><?php echo $val['quantity']; ?> </td>
                            <td><?php echo $val['price']; ?> </td>
                            <td><?php echo $val['tax']; ?> </td>
                            <td><?php echo $val['total']; ?> </td>
                        </tr><?php
                    }
                    ?>			
                </tbody>
            </table>


            <table class="calculation bpmTopic" width="50%" style="float:right !important;">
                <tbody>
                    <tr>
                        <td style="width:60%">Subtotal:</td>
                        <td><?php echo $invoice_detail['sub_total']; ?></td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td><?php echo $invoice_detail['total_tax']; ?></td>
                    </tr>
                    <tr>
                        <td>Discount:</td>
                        <td><?php echo $invoice_detail['discount']; ?></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td><?php echo $invoice_detail['grand_total']; ?><?php echo $invoice_detail['currency']; ?></td>
                    </tr>
                </tbody>
            </table>


            <table class="client_notes" width="50%">
                <tbody>
                    <tr>
                        <td>Client Notes: </td>
                    </tr>
                    <tr>
                        <td><?php echo $invoice_detail['client_note'];?></td>
                    </tr>
                </tbody>
            </table>


            <table class="termsncondition footer" width="100%">
                <tbody>
                    <tr>
                        <td>Terms & Condition: </td>
                    </tr>
                    <tr>
                        <td><?php echo $invoice_detail['termsncondition']; ?></td>
                    </tr>
                </tbody>
            </table>

        </section>
    </body>
</html>    
