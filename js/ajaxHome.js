jQuery(document).ready(function($) {
	
	$('#mxd-form').submit(function() {
		$('#mxd_loading').show();
		//alert('bla');
		$('#mxd_submit').attr('disabled', true);
		
      data = {
      	action: 'mxd_get_results',
      	mxd_nonce: mxd_vars.mxd_nonce,
      	bla: 'jajaj',
      	ble:'asdf'
      };

     	$.post(ajaxurl, data, function (response) {
			$('#mxd_results').append(response);
			$('#mxd_loading').hide();
			$('#mxd_submit').attr('disabled', false);
			
		});	

		
		return false;
	});
	$('#testBut').click(function() {
		$('#mxd_loading').show();
		//alert('bla');
		$('#mxd_submit').attr('disabled', true);
		
      data = {
      	action: 'mxd_get_results',
      	mxd_nonce: mxd_vars.mxd_nonce,
      	bla: 'jajaj',
      	ble: 'jejejej'
      };

     	$.post(ajaxurl, data, function (response) {
			$('#mxd_results').append(response);
			$('#mxd_loading').hide();
			$('#mxd_submit').attr('disabled', false);
			
		});	

		
		return false;
	});

});