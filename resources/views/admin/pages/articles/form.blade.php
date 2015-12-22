<form role="form" action="{!! URL::Route('admin.settings.articles.submit') !!}" method="POST" enctype="multipart/form-data">
	@include('admin.includes.status')

	{!! Form::hidden('id',isset($record->id) ? $record->id : '',array('class' => 'form-control')); !!}


	<div class="form-group">
		<label>Title</label>
		{!! Form::text('title',isset($record->title) ? $record->title : '',array('class' => 'form-control', 'placeholder' => 'Enter Title')); !!}
	</div>

	<div class="form-group">
		<label>Content</label>
		
		{!! Form::textarea('content',isset($record->content) ? $record->content : '',array('class' => 'form-control summernote', 'placeholder' => 'Enter Content', 'row' => '4')); !!}
	</div>

	<div class="form-group">

		<label>Thumbnail</label>

		@if (isset($record->thumbnail) && $record->thumbnail)
			<a class="btn btn-default btn_thumbnail"><span class="glyphicon glyphicon-trash"></span></a>
			{!! Form::file('thumbnail',array('class' => 'upload_thumbnail','style' => 'display:none;')); !!}
			<img class="review_thumbnail" src="{!!$record->thumbnail_url!!}">
		@else
			<a class="btn btn-default btn_thumbnail" style="display:none;"><span class="glyphicon glyphicon-trash"></span></a>
			{!! Form::file('thumbnail',array('class' => 'upload_thumbnail')); !!}
			<img class="review_thumbnail" src="http://placehold.it/396x550">
		@endif
		{!! Form::hidden('delete_thumbnail','0',array('class' => 'delete_thumbnail form-control')); !!}

	</div>

	<div class="form-group">

		<label>Image</label>

		@if (isset($record->image) && $record->image)
			<a class="btn btn-default btn_image"><span class="glyphicon glyphicon-trash"></span></a>
			{!! Form::file('image',array('class' => 'upload_image','style' => 'display:none;')); !!}
			<img class="review_image" src="{!!$record->image_url!!}">
		@else
			<a class="btn btn-default btn_image" style="display:none;"><span class="glyphicon glyphicon-trash"></span></a>
			{!! Form::file('image',array('class' => 'upload_image')); !!}
			<img class="review_image" src="http://placehold.it/396x550">
		@endif
		{!! Form::hidden('delete_image','0',array('class' => 'delete_image form-control')); !!}

	</div>

	<div class="form-group">
		<label>Publish</label>

		{!! Form::select('publish', array('1' => 'Yes', '0' => 'No'), isset($record->publish) ? $record->publish : '' ,array('class' => 'form-control')); !!}

	</div>

	<button type="submit" class="btn btn-default">Submit</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>