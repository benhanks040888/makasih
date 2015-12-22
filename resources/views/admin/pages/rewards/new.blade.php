@extends('admin.layouts.main')

@section('scripts')
	<script src="{!! asset('assets/admin/ckeditor/ckeditor.js') !!}"></script>
	@include('admin.includes.image-upload-js')
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Reward</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-6">
		@include('admin.pages.rewards.form')
	</div>
</div>
@stop