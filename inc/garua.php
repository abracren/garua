<?php
/**
 *  Garua Specicific Function.
 *
 * @package garua
 */


if ( ! function_exists( 'garua_custom_article_header' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function garua_custom_article_header() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		//_x( 'Posted on %s', 'post date', 'garua' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		//_x( 'by %s', 'post author', 'garua' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span> <span class="byline">  | ' . $byline . '</span>';
	echo ' | ';
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'garua' ) );
		if ( $categories_list && garua_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '%1$s', 'garua' ) . '</span>', $categories_list );
		}
	}
	echo ' | ';

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'garua' ), __( '1 Comment', 'garua' ), __( '% Comments', 'garua' ) );
		echo '</span>';
	}


}
endif;

function garua_load_scripts() {
		
		
		
		wp_enqueue_script('mxd-ajax', get_template_directory_uri() . '/js/ajaxHome.js', array('jquery'));
		wp_localize_script('mxd-ajax', 'mxd_vars', array(
				'mxd_nonce' => wp_create_nonce('mxd-nonce')
			));
		

	}
add_action( 'addJsAjax', 'garua_load_scripts' );

function mxd_get_ajax(){
	if( !isset( $_POST['mxd_nonce'] ) || !wp_verify_nonce($_POST['mxd_nonce'], 'mxd-nonce') )
		die('Permissions check failed');	
	

	echo $_POST['bla'];
	echo $_POST['ble'];
	die();
}
//add_action('wp_ajax_mxd_get_results',  array($this,'mxd_get_ajax'));
add_action('wp_ajax_nopriv_mxd_get_results', 'mxd_get_ajax');
add_action('wp_ajax_mxd_get_results',  'mxd_get_ajax');

function garua_testAction() {
	// Like, beat it. Dig?
	echo 'hola desde function';
}
add_action( 'testGarua', 'garua_testAction' );


function panelBackgroundColor($color){
	if($color!='transparent'){
		$outputPanel ='garua-panel';
	}else{
		$outputPanel = '';
	}
	return $outputPanel;
}

// Add Shortcode
function garua_columns_sh( $atts , $content = null ) {

	// Attributes
	$a = shortcode_atts(
		array(
			'column'=>'12/12',
			'last' => 'no',
			'panel'=> 'transparent'
		), $atts );
	if($a['column']=='1/2'){
		$outputClass = 'sh-half-column';

	}elseif ($a['column']=='1/3') {
		$outputClass = 'sh-third-column';
	}elseif ($a['column']=='1/4') {
		$outputClass = 'sh-quarter-column';
	}elseif ($a['column']=='3/4') {
		$outputClass = 'sh-three-quarters-column';
	
	}else{
		$outputClass= 'sh-full-width';
	}

	if ($a['last']!='no'){
	
		$outputClass= $outputClass .' last';
	}
	$outputPanel= panelBackgroundColor($a['panel']);
		
	
	return '<div class="' . esc_attr($outputClass) . ' '. esc_attr($outputPanel) .'" style="background-color:'.esc_attr($a['panel']).';">' . $content . '</div>';
}
add_shortcode( 'grid', 'garua_columns_sh' );

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop', 99 );
add_filter( 'the_content', 'shortcode_unautop', 100 );



function add_admin_scripts( $hook ) {

    global $post;

    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'garua-template' === $post->post_type ) {     
            wp_enqueue_script(  'myscript', get_stylesheet_directory_uri().'/js/garua-editor.js' );
            wp_register_style( 'garua-editor', get_template_directory_uri() . '/css/garua-editor.css', false, '1.0.0' );
            wp_enqueue_style( 'garua-editor' );


        }
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );




