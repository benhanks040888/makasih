<form role="form" action="{!! URL::Route('admin.settings.items.submit') !!}" method="POST" enctype="multipart/form-data">
	@include('admin.includes.status')

	{!! Form::hidden('id',isset($record->id) ? $record->id : '',array('class' => 'form-control')); !!}


	<div class="form-group">
		<label>Name</label>
		{!! Form::text('name',isset($record->name) ? $record->name : '',array('class' => 'form-control', 'placeholder' => 'Enter Name')); !!}
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
		<label>Price</label>
		{!! Form::number('price',isset($record->price) ? $record->price : '',array('class' => 'form-control', 'placeholder' => 'Enter Price')); !!}
	</div>

	<div class="form-group">
		<label>Point</label>
		{!! Form::number('point',isset($record->point) ? $record->point : '',array('class' => 'form-control', 'placeholder' => 'Enter Point')); !!}
	</div>

	<div class="form-group">
		<label>Type</label>

		{!! Form::select('type', Config::get('types.item'), isset($record->type) ? $record->type : '' ,array('class' => 'form-control')); !!}

	</div>

	<div class="form-group">
		<label>Tags</label>
		
		{!! Form::select('tags', Config::get('types.reward'), isset($record->tags) ? explode(', ', $record->tags) : '' , array('class' => 'form-control','multiple'=>'multiple','name'=>'tags[]')); !!}

	</div>

	<div class="form-group">
		<label>Publish</label>

		{!! Form::select('publish', array('1' => 'Yes', '0' => 'No'), isset($record->publish) ? $record->publish : '' ,array('class' => 'form-control')); !!}

	</div>

	<button type="submit" class="btn btn-default">Submit</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>