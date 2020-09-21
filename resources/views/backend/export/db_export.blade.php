@extends('backend.layouts.app')
@section('title', 'Export')
@section('content')
<section class="content">
	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-body with-border">
	      	<h3>Database Backup</h3><br>
	      	<a href="#" class="btn btn-success"><i class="fa fa-download"></i> &nbsp; Download & Create Backup</a>
            	      	<!--<a href="{{ route('export.dbexport')}}" class="btn btn-success"><i class="fa fa-download"></i> &nbsp; Download & Create Backup</a>-->
	      </div>
	  </div>
	</div>
</section>

<script>
    $("#export").addClass('active');
</script>
@endsection