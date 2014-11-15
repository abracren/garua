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
		<div id="owl-slider-frontpage" class="slider-fullwidth-container owl-carousel">
			<div><img src="//garua.dev/images/1900x500.gif"/></div>
			<div><img src="//garua.dev/images/1900x500.gif"/></div>
			<div><img src="//garua.dev/images/1900x500.gif"/></div>
			<div><img src="//garua.dev/images/1900x500.gif"/></div>
	
		</div><!-- End>> owl-slider -->
    </div><!-- End>> slider-wrap -->


	<div class="headings-frontpage-wrap">
		<ul class="headings-frontpage-container">
			<li class="heading1 item"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
			<li class="heading2 item"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
			<li class="heading3 item last"> 
				<img></img>
				<h2>Title</h2>
				<p>Description</p>
			</li>
		</ul><!-- End>> headings-container -->
	</div><!-- End>> eadings-wrap -->

	<div class="grids-wrap">
		<div class="inside-container">
			<h2>Grids</h2>
		</div>
		<ul class="frontpage-grid-top">
			<li class="item1 item" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
			</li>
			<li class="item2 item" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center ;">
			</li>
			<li class="item3 item " style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center;">
			</li>
		</ul><!-- End>> frontpage-grid-top -->

		 
		<ul class="frontpage-grid-bottom">
			
			<li class="item1 item" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center ;">
			</li>
			<li class="item2 item " style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center;">
			</li>
			<li class="item3 item" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
			</li>
		</ul><!-- End>> frontpage-grid-bottom -->
	</div><!-- End>> grids-wrap -->

	<div class="portfolio-wrap">
		<div class="inside-container">
			<h2>Portfolio</h2>
		</div>
		<ul class="portfolio-grid portfolio-4-col">

			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>

			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
			<li><img src="//garua.dev/images/250_2.gif"/></li>
		</ul><!-- End>> portfolio-grid -->
		
	</div><!-- End>> portfolio-wrap -->

	<div class="brands-wrap">
		<ul class="brands-grid">
			<li><img src="//placehold.it/200x50&text=Brand"/></li>
			<li><img src="//placehold.it/200x50&text=Brand"/></li>
			<li><img src="//placehold.it/200x50&text=Brand"/></li>
			<li><img src="//placehold.it/200x50&text=Brand"/></li>
			<li><img src="//placehold.it/200x50&text=Brand"/></li>
			
		</ul>


	</div>
	<div class="footer-goup-wrap">
		<span> go-up </span>
	</div>
	<div class="footer-credits-wrap">
		
		<ul class="footer-credits-container">
			<li class="item">a</li>
			<li class="item">a</li>
			<li class="item last">a</li>
			
		</ul>


	</div>
	
	
</div><!-- End>> frontpage -->



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
 
  $("#owl-slider-frontpage").owlCarousel({
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


