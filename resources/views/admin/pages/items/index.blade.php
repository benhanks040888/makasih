@extends('admin.layouts.main')

@section('scripts')
	<script type="text/javascript">

		$(document).ready(function() {
       		$('#dataTables-example').DataTable({
                responsive: true
	        });
	    });

	</script>
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Items</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel">
			<a href="{!! URL::Route('admin.settings.items.new') !!}" class="btn btn-default">Add New</a>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				DataTables Advanced Tables
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@include('admin.includes.status')
				<div class="dataTable_wrapper">
		
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Point</th>
								<th>Type</th>
								<th>Tags</th>
								<th>Publish</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($records as $key => $record)
								<tr>
									<td>{!! $key+1 !!}</td>
									<td>{!! $record->name !!}</td>
									<td><a target="_blank" href="{!!$record->image_url !!}">{!! $record->image_name !!}</a></td>
									<td>{!! $record->price !!}</td>
									<td>{!! $record->point !!}</td>
									<td>{!! ucwords($record->type) !!}</td>
									<td>{!! ucwords($record->tags) !!}</td>
									<td>{!! $record->publish ? 'Yes' : 'No' !!}</td>
									<td style="width: 120px">
										<a href="{!! URL::Route('admin.settings.items.edit',array($record->id)) !!}" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
										<a href="{!! URL::Route('admin.settings.items.delete',array($record->id)) !!}" class="btn btn-default confirm_delete"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
					
				</div>
				
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

@stop