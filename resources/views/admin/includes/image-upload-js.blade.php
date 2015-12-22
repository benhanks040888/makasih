<script type="text/javascript">

	$('.btn_thumbnail').click(function(){
		$('.delete_thumbnail').val('1');
		$('.review_thumbnail').attr('src','http://placehold.it/396x550');
		$(this).hide();
		$('.upload_thumbnail').show().val(null);
	});

	$(".upload_thumbnail").change(function(){
	    readURL(this, $('.review_thumbnail'));
	    $(this).hide();
	    $('.btn_thumbnail').show();
	});

	$('.btn_image').click(function(){
		$('.delete_image').val('1');
		$('.review_image').attr('src','http://placehold.it/396x550');
		$(this).hide();
		$('.upload_image').show().val(null);
	});

	$(".upload_image").change(function(){
	    readURL(this, $('.review_image'));
	    $(this).hide();
	    $('.btn_image').show();
	});

	function readURL(input, target) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				target.attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	//CKEDITOR.replace('ckeditor');
</script>