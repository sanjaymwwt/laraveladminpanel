@extends('backend.layouts.app')
@section('title', 'Invoice List')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Invoice List</h4>
                </div>

                <div class="col-md-6 text-right">
                    <?php
                    if (in_array('add', $data['users_rights'])) {
                        ?>
                        <a href="{{ route('invoices.add_invoice')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New Invoice</a>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Invoices Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">

            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Invoice#</th>
                        <th>Client</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th width="150" class="text-right">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['invoice'])) {
                        foreach ($data['invoice'] as $record):
                            $record = (array) $record;
                            ?>
                            <tr>
                                <td><?= $record['invoice_no']; ?></td>
                                <td><?= $record['client_name']; ?></td>
                                <td><?= $record['grand_total'] . ' ' . $record['currency']; ?></td>
                                <td><?= $record['due_date']; ?></td>
                                <td><span class="btn btn-success btn-flat btn-xs"><?= $record['payment_status']; ?><span></td>
                                            <td><div class="btn-group pull-right">     
                                                    <?php if (in_array('view', $data['users_rights'])) { ?>
                                                    <a href="{{ route('invoices.view_invoice',$record['id']) }}"  class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <?php }?>
                                                    <a href="{{ route('invoices.invoice_pdf_download',$record['id']) }}" class="btn btn-primary"><i class="fa fa-download"></i></a>                                                    
                                                    <?php if (in_array('edit', $data['users_rights'])) { ?>
                                                        <a href="{{ route('invoices.edit_invoice',$record['id']) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>                                                    
                                                    <?php } ?>
                                                    <?php if (in_array('delete', $data['users_rights'])) { ?>
                                                        <a href="{{ route('invoices.invoice_delete',$record['id']) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                        <?php } ?>
                                                </div></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    } else {
                                        echo '<tr colspna="7">No record found!</tr>';
                                    }
                                    ?>
                                    </tbody>

                                    </table>
                                    </div>
                                    <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                    </section>  

                                    <!-- DataTables -->
                                    <script src="{{ asset('resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" ></script>
                                    <script src="{{ asset('resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
                                    <script>
                                                $(function () {
                                                    $("#example1").DataTable();
                                                });
                                    </script> 
                                    <script>
                                        $("#invoices").addClass('active');
                                    </script>     


                                    @endsection

