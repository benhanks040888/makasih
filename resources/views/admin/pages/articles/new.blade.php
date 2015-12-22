@extends('admin.layouts.main')

@section('scripts')
	@include('admin.includes.image-upload-js')
	<script type="text/javascript" src="{!!assets_url('summernote/summernote.js')!!}"></script>
	<script type="text/javascript">
		$('.summernote').summernote({
		   height: 100,
		   styleWithSpan: false,
		   onImageUpload: function(files, editor, welEditable) {
			 sendFile(files[0], editor, welEditable);
		   },
		   toolbar: [
			 ['style', ['bold', 'italic', 'underline', 'clear']],
			 ['font', ['strikethrough']],
			 ['fontsize', ['fontsize']],
			 ['color', ['color']],
			 ['para', ['ul', 'ol', 'paragraph']],
			 ['height', ['height']],
			 ['table', ['table']],
			 ['insert', ['link', 'picture', 'video']],
			 ['code', ['codeview', 'undo', 'redo', 'help']]
		   ]
		 });
		 
		 function sendFile(file, editor, welEditable) {
		   data = new FormData();
		   data.append('file', file);
		   $.ajax({
			 data:  data,
			 type: "POST",
			 url: "{!! URL::route('admin.settings.articles.create-image-ajax') !!}",
			 cache: false,
			 contentType: false,
			 processData: false,
			 success: function(url) {
			   editor.insertImage(welEditable, url);
			   // window.alert(url);
			 }
		   });
		};
	</script>
@stop

@section('styles')
<link rel="stylesheet" href="{!!assets_url('summernote/summernote.css')!!}">
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">New Article</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-6">
		@include('admin.pages.articles.form')
	</div>
</div>
@stop