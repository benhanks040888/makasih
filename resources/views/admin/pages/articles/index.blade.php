@extends('admin.layouts.main')

@section('scripts')
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
    	$(document).ready(function() {
       		$('#dataTables-example').DataTable({
                responsive: true
	        });
	        sortTableTriger();
	    });

	    //  =========== Table Short ===========================
		
		function sortTableTriger(){
			var fixHelper = function(e, ui) {
		    	ui.children().each(function() {
		        $(this).width($(this).width());
			    });
			    //console.log(ui);
			    return ui;
			};

			$("#dataTables-example tbody").sortable({
			    helper: fixHelper,
			    stop: function( event, ui ) {
			    	//console.log(ui.item, ui.position, ui.originalPosition);
			    	loopTable(this);
			    }
			}).disableSelection();
		}

		function loopTable(obj) {
			$(obj).each(function() {
		        $(this).find("tr").each(function(index, element){
		            //do something
		            $(this).children().find("input").val(index+1);
		        });
		    });
		}

		//  =========== End Table Short ===========================
    </script>
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Articles</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel">
			<a href="{!! URL::Route('admin.settings.articles.new') !!}" class="btn btn-default">Add New</a>
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
					{!! Form::open(array('route' => array('admin.settings.articles.order.submit'),'role' => 'form')) !!} 
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No.</th>
								<th>Title</th>
								<th>Thumbnail</th>
								<th>Created</th>
								<th>Publish</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($records as $key => $record)
								<tr>
									<td>
										<input type="hidden" name="category_order[{!! $record->id !!}]" value="{!! $key+1 !!}"/>
										{!! $key+1 !!}
									</td>
									<td>{!! $record->title !!}</td>
									<td><a target="_blank" href="{!!$record->thumbnail_url !!}">{!! $record->thumbnail_name !!}</a></td>
									<td>{!! $record->created !!}</td>
									<td>{!! $record->publish ? 'Yes' : 'No' !!}</td>
									<td style="width: 120px">
										<a href="{!! URL::Route('admin.settings.articles.edit',array($record->id)) !!}" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></a>
										<a href="{!! URL::Route('admin.settings.articles.delete',array($record->id)) !!}" class="btn btn-default confirm_delete"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
					<button>Order Save</button>
					{!! Form::close() !!}
				</div>
				
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

@stop