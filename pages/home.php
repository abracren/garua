<?php
/*
Template Name: Home
*/

?>

<?php get_header(); ?>
</div> <!-- End main page -->

<div class="frontpage">
	<div class="slider-wrap" >
		<!-- <div id="owl-example" class=" slider-container  owl-carousel"> -->
		<div id="owl-example" class=" slider-fullwidth-container owl-carousel">
			<div >
				<img src="//garua.dev/images/1900x500.gif"/>
			</div>
			<div>
				<img src="//garua.dev/images/1900x500.gif"/>
			</div>
			<div>
				<img src="//garua.dev/images/1900x500.gif"/>
			</div>
			<div>
				<img src="//garua.dev/images/1900x500.gif"/>
			</div>
			<div>
				<img src="//garua.dev/images/1900x500.gif"/>
			</div>
		</div>
	
	
    </div>


	<div class="headings-wrap">
		<ul class="headings clearfix">
			<li class="heading1"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
			<li class="heading2"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
			<li class="heading3"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
		</ul>
	</div>
	<div class="grids-wrap">
		<ul class="frontpage-grid-top">
			<li class="item1 item" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
			</li>
			<li class="item2 item" style="background:#fff url('//garua.dev/images/250.gif') no-repeat center center ;">
			</li>
			<li class="item3 item " style="background:#fff url('//garua.dev/images/250.gif') no-repeat center center;">
			</li>
		</ul>

		 
		<ul class="frontpage-grid-bottom">
			
			<li class="item1 item" style="background:#fff url('//garua.dev/images/250.gif') no-repeat center center ;">
			</li>
			<li class="item2 item " style="background:#fff url('//garua.dev/images/250.gif') no-repeat center center;">
			</li>
			<li class="item3 item" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
			</li>
		</ul>
	</div>
	<div class="portfolio-wrap">
		
		<h3>4 columns</h3>
		<ul class="portfolio-grid portfolio-4-col">
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>

			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
		</ul>
		
	</div>
	
	
</div>
<!-- <h2>testAjax</h2>
		
		<form id="mxd-form" action="" method="POST">
			<div>
				<input type="submit" name="mxd-submit" id="mxd_submit" class="button-primary" value="<?php _e('get Ajax Response', 'garua'); ?>"/>
				<img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="mxd_loading" style="display:none;"/>
			</div>
		</form>
		<div id="mxd_results"> </div> -->
<?php
//do_action( 'testGarua' );
//do_action( 'addJsAjax' );
?>


<?php get_footer(); ?>
<div class="garuafw_debug">
	<div id="accordion">

		<h4 class="accordion-toggle">DEBUG</h4>
		<div class="accordion-content">
			<?php
			if($garuafw_debug){
			$options = get_option( 'garuafw_settings' );
			echo '<pre>';
			print_r($options);
			echo '</pre>' ;
			//echo $options[garuafw_text_field_0];
			}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';


$(document).ready(function() {
 
  $("#owl-example").owlCarousel({
  	loop:true,
  	 items:1,
     nav:false,
     autoplay:true,
     autoplayTimeout:1000,
     autoplayHoverPause:true,


      

  	});
 $('#accordion').find('.accordion-toggle').click(function(){

      //Expand or collapse this panel
      $(this).next().slideToggle('slow');

      //Hide the other panels
      $(".accordion-content").not($(this).next()).slideUp('slow');

    });
});

</script>


