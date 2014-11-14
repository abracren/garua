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
	
	echo 'test22';
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



