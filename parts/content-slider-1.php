
<div class="slider-wrap" >
	<?php 

	$options = get_option( 'garuafw_settings' );

	if ($options['garuafw_template_1_slider_1_field']){

		$sliderClass='slider-fullwidth-container';
	}else{
		
		$sliderClass='slider-container';

	}?>
	<!-- <div id="owl-example" class=" slider-container  owl-carousel"> -->
	<div id="owl-slider-frontpage" class=" <?php echo $sliderClass;?>  owl-carousel">
		<div><img src="//garua.dev/images/1900x500.gif"/></div>
		<div><img src="//garua.dev/images/1900x500.gif"/></div>
		<div><img src="//garua.dev/images/1900x500.gif"/></div>
		<div><img src="//garua.dev/images/1900x500.gif"/></div>

	</div><!-- End>> owl-slider -->
</div><!-- End>> slider-wrap -->