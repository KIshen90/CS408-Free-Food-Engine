$(document).ready(function(){


		$('#msform').validate({
	    rules: {
	       eventname: {
	        required: true,
	       required: true
	      },
		  
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
		}
	  });

}); // end document.ready