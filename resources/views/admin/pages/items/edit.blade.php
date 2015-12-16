@extends('admin.layouts.main')

@section('scripts')
	@include('admin.includes.image-upload-js')
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Item</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-6">
		@include('admin.pages.items.form')
	</div>
</div>
@stop