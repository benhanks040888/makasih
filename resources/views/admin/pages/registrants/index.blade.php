@extends('admin.layouts.main')

@section('scripts')
<script type="text/javascript">

	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
		
		$(function() {
			$( "#from" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				dateFormat: 'yy-mm-dd',
				onClose: function( selectedDate ) {
					$( "#to" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				dateFormat: 'yy-mm-dd',
				onClose: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
		});

		$('#btn_filter').click(function(e){
			
			// changeTextHidden(1);
		});

		$('#btn_download').click(function(e){
			// changeTextHidden(2);
			
		});

		function changeTextHidden($id){
			$('#text_type').val($id);
			return true;
		}

	});


</script>
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Registrants</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Blast Emails
			</div>

			<div class="panel-body">
				<a href="{!! URL::Route('admin.registrants.email.blast', 'point') !!}" class="btn btn-primary btn-default" {!! $email_queue > 0 ? 'disabled="disabled"' : '' !!}>by Points</a>
				<a href="{!! URL::Route('admin.registrants.email.blast', 'all') !!}" class="btn btn-primary btn-default" {!! $email_queue > 0 ? 'disabled="disabled"' : '' !!}>to All</a>
				<div class="text-info">
					Email Queue = {!! $email_queue !!},
					wait till emails queue equals zero to submit another blast emails,
					<b>Last Queue Process :</b> {!! $last_blast_record ? $last_blast_record->updated_at : '-' !!}
				</div>
			</div>

		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		{!! Form::open(array('route' => 'admin.registrants','method' => 'get')) !!}
		<div class="panel panel-default">
			<div class="panel-heading">
				Filter
			</div>

			<div class="panel-body">
				
				<label for="from">From</label>
				{!! Form::text('date_from', isset($input['date_from']) ? $input['date_from'] : '', array('id' => 'from')) !!}

				<label for="to">to</label>
				{!! Form::text('date_end', isset($input['date_end']) ? $input['date_end'] : '', array('id' => 'to')) !!}
				
				{!! Form::hidden('type', isset($input['type']) ? $input['type'] : '1', array('id' => 'text_type')) !!}

			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-default" id="btn_filter">Filter</button>
			</div>
		</div>
		{!! Form::close() !!}
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
								<th>Referral Code</th>
								<th>Name</th>
								<th>Referral From</th>
								<th>Total Point</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($records as $key => $record)
							<tr>
								<td>{!! $key+1 !!}</td>
								<td>{!! $record->referral_code !!}</td>
								<td>{!! !empty($record->name) ? $record->name : '-'!!}</td>
								<td>{!! !empty($record->referral_name) ? $record->referral_name : '-' !!}</td>
								<td>{!! $record->total_point !!}</td>
								<td>
									<a href="{!! URL::Route('admin.registrants.details',array($record->id)) !!}" class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></a>
									<a href="{!! URL::Route('admin.registrants.delete',array($record->id)) !!}" class="btn btn-default confirm_delete"><span class="glyphicon glyphicon-trash"></span></a>
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