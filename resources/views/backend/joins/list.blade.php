@extends('backend.layouts.app')
@section('title', 'Serverside Join')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <h3>Datatable - ServerSide Processing with Join Example</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Here we are fetching the record from two tables (user and payment) usign server-side datatable joins.</p>
        </div>
        <div class="col-md-6">
            <strong>USER TABLE:</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>nauman</td>
                        <td>naumanahmedcs@gmail.com</td>
                        <td>03469548054</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>rizwan</td>
                        <td>rizwan@gmail.com</td>
                        <td>12345</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <strong>PAYMENT TABLE:</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID<th>
                        <th>Invoice#</th>
                        <th>Amount</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1<td>
                        <td>INV-2002</td>
                        <td>300</td>
                        <td>2017-12-06</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2<td>
                        <td>INV-1001</td>
                        <td>400</td>
                        <td>2017-12-12</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Content Header (Page header) -->
<span id="form_output"></span>
<section class="content">

    <div class="box">    
        <div class="box-header">
            <h3 class="box-title">Server Side Datatable With Join</h3>
        </div>
        <!-- /.box-header -->

        <span style="color:red; align-items: center; display: none;" class="error_delete nortification_msgalert"></span>

        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>                       
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Invoice No.</th>
                        <th>Amount</th>
                        <th>Created Date</th>                        
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>  

<script src="{{ asset('resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var table = $('#table_list').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "joins/datatable_json",
        "type": "POST",
        data: {_token: CSRF_TOKEN}
    },
    "order": [[1, 'asc']],
    columns: [       
        {data: 'username', name: 'username', orderable: true},
        {data: 'email', name: 'email', orderable: true},
        {data: 'mobile_no', name: 'mobile_no', orderable: true},
        {data: 'invoice_no', name: 'invoice_no', orderable: true},
        {data: 'amount', name: 'amount', orderable: true},
        {data: 'created_date', name: 'created_date', orderable: true},
    ],
    columnDefs: [
        {orderable: false, targets: [1, 2, 3]} //This part is ok now
    ]
});

</script>

@endsection
