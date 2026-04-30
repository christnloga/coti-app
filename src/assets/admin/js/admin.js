// picture 1
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#imageResult')
          .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
}


// Croppie image crop script
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
			width:300,
			height:320
		},
		boundary: {
			width:350,
			height:370
		}
	});

	$('#insert_image').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(event){
			$image_crop.croppie('bind', {
				url: event.target.result
			}).then(function(){
				console.log('JQuery bind complete');
			});
		}
		reader.readAsDataURL(this.files[0]);
		//$('#insertimageModal').modal('show');
	});

	$('#change_image').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(event){
			$image_crop.croppie('bind', {
				url: event.target.result
			}).then(function(){
				console.log('JQuery bind complete');
			});
		}
		reader.readAsDataURL(this.files[0]);
		$('#actual_image').fadeOut('fast');
		$('#new_image').fadeIn(3000);
	});

	$(document).on('click', '#discard_image', function(){
		$('#new_image').fadeOut('fast');
		$('#actual_image').fadeIn(3000);
	});

// Croppie image crop script//

