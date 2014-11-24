<?php
/*
Template Name: Home 
*/

?>

<?php get_header(); ?>
</div> <!-- End main page -->

<?php
$options = get_option( 'garuafw_settings' );

$garuafw_parts = $options['garuafw_frontpage_order_field'];
$garuafw_part =  explode(",", $garuafw_parts);



 ?>
<div class="frontpage">

<?php 
foreach ($garuafw_part as $part ) {
	get_template_part( 'parts/content', $part );
}
?>


	

	<div class="grids-wrap">
		<div class="inside-container">
			<h2>Grids</h2>
		</div>
		<ul class="frontpage-grid-top">
			<li class="item1 item"data-add="animated garua-visible bounceInLeft FadeIn"  data-offset="300" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
			</li>
			<li class="item2 item"  data-add="animated garua-visible bounceInRight FadeIn"  data-offset="300" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center ;">
			</li>
			<li class="item3 item" data-add="animated garua-visible bounceInRight FadeIn"  data-offset="300" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center;">
			</li>
		</ul><!-- End>> frontpage-grid-top -->

		 
		<ul class="frontpage-grid-bottom">
			
			<li class="item1 item" data-add="animated garua-visible bounceInLeft FadeIn"  data-offset="300" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center ;">
			</li>
			<li class="item2 item " data-add="animated garua-visible bounceInLeft FadeIn"  data-offset="300" style="background:#fff url('//garua.dev/images/530x250.gif') no-repeat center center;">
			</li>
			<li class="item3 item" data-add="animated garua-visible bounceInRight FadeIn"  data-offset="300" data-repeat="false" style="background:#fff url('//garua.dev/images/530x250.gif')no-repeat center center ;">
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
		<ul class="brands-container brands-4">
			
					<li><img src="//placehold.it/200x50&text=Brand"/></li>
					<li><img src="//placehold.it/200x50&text=Brand"/></li>
					<li><img src="//placehold.it/200x50&text=Brand"/></li>
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
			<li class="item">
				<div class="item-title"><h5>We are here for your convenience</h5></div>
				<div class="item-content"><p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, luctus, metus. Lorem ipsum dolor sit amet, consectetur eu vulputate magna eros eu erat.</p></div>
			</li>
			<li class="item">
				<div class="item-title"><h5>We are here for your convenience</h5></div>
				<div class="item-content"><p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, luctus, metus. Lorem ipsum dolor sit amet, consectetur eu vulputate magna eros eu erat.</p></div>
			</li>
			<li class="item last">
				<div class="item-title"><h5>We are here for your convenience</h5></div>
				<div class="item-content"><p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, luctus, metus. Lorem ipsum dolor sit amet, consectetur eu vulputate magna eros eu erat.</p></div>
			</li>
			
		</ul>


	</div>
	
	
</div><!-- End>> frontpage -->



 <h2>testAjax</h2>
		
		<form id="mxd-form" action="" method="POST">
			<div>
				<input type="submit" name="mxd-submit" id="mxd_submit" class="button-primary" value="<?php _e('get Ajax Response', 'garua'); ?>"/>
				<img src="<?php echo admin_url('/images/wpspin_light.gif'); ?>" class="waiting" id="mxd_loading" style="display:none;"/>

			</div>
		</form>
		<a id="testBut" href="#"> test</a></br>
		<div id="mxd_results"> 
		<!-- <textarea name="123"></textarea> -->
		</div> 
<?php
//do_action( 'testGarua' );
do_action( 'addJsAjax' );
?>



<?php get_footer(); ?>
<div class="garuafw_debug">
	<div id="accordion">

		<h4 class="accordion-toggle">DEBUG</h4>
		<div class="accordion-content">
			<?php
			if($garuafw_debug){
			
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


