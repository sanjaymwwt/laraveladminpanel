@extends('backend.layouts.app')
@section('title', 'Page listing')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">

<span id="form_output"></span>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-body">
                <div class="col-md-6">
                    <h4><i class="fa fa-list"></i> &nbsp; Pages List </h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('front_pages.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add New Page </a>
                </div>

            </div>
        </div>
    </div>

   
    <div class="box">    
        <div class="box-header">            
        </div>
        <!-- /.box-header -->

        <span style="color:red; align-items: center; display: none;" class="error_delete nortification_msgalert"></span>

        <div class="box-body table-responsive">
            <table id="table_list" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Content</th>
                        <th>URL</th>
                        <th>Target</th>  
                        <th>Status</th>  
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>  

<!-- /.row -->
<div id="confirm-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('resources/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('resources/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
<script>
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                       
                        var table = $('#table_list').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax": {
                                "url": "front_pages/datatable_json",
                                "type": "POST",
                                data: {_token: CSRF_TOKEN}
                            },
                            "order": [[1, 'asc']],
                            columns: [
                                {data: 'page_name', name: 'page_name', orderable: true},
                                {data: 'page_description', name: 'page_description', orderable: true},
                                {data: 'page_url', name: 'page_url', orderable: true},
                                {data: 'page_target', name: 'page_target', orderable: true},
                                {data: 'status', name: 'status', orderable: true},
                                {data: 'action', name: 'action', orderable: true},                                
                            ],
                            columnDefs: [
                                {orderable: false, targets: [1, 2, 3]} //This part is ok now
                            ]
                        });

</script>


@endsection
