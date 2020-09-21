@extends('backend.layouts.app')
@section('title', 'Simple Join')
@section('content')

<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Simple Datatable Join Example</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>User Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>TXN Id</th>
          <th>Amount</th>
          <th>Created</th> 
        </tr>
        </thead>
        <tbody>
          <?php           
          foreach($payment_detail as $row): 
             $row = (array) $row;
              ?>
          <tr>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['mobile_no']; ?></td>
            <td><?= $row['invoice_no']; ?></td>
            <td><?= $row['grand_total']. $row['currency']; ?></td>
            <td><?= $row['created_date']; ?></td>
		  </tr>
          <?php endforeach; ?>
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
  $("#view_users").addClass('active');
</script>        
@endsection