<?php
/**
 * Template Name: Custom Post Type Page
 */
get_header(); ?>

<?php
    //See if we have any values
    $post_meta      =array();
    $post_meta      = get_post_meta( $post->ID,false );
    $posttype       = isset( $post_meta['_cpt_post_type'] ) ? $post_meta['_cpt_post_type'][0] : 1;
    //echo $posttype;
    //$orderby        = isset( $post_meta['_cpt_order_by'] ) ? $post_meta['_cpt_order_by'][0] : 'date';
    //$asc            = isset( $post_meta['_cpt_asc'] ) ? $post_meta['_cpt_asc'][0] : 'DESC';
    //$post_count     = isset( $post_meta['_cpt_post_count'] ) ? $post_meta['_cpt_post_count'][0] : get_option('posts_per_page');
    // if(!$post_count || !is_numeric( $post_count )) 
    //     $post_count = get_option('posts_per_page');
?>  
<div id="primary" class="content-area garua-sidebar equalheight">
		<main id="main" class="site-main" role="main">

<?php 

/**-----------------------------------------------------------------------------
 *
 *  Start our custom query to display custom post type posts
 *
*------------------------------------------------------------------------------*/

        $args = array( 
            'post_type' => "garua-template",
            'name' => $posttype
            
        );

       
            
            $cpt_query = new WP_Query($args);
        

        // Output
        if ( $cpt_query->have_posts() ) :

            $counter = 1; //Starts counter for post column lay out

            // Start the Loop.
            while ( $cpt_query->have_posts() ) : $cpt_query->the_post(); ?>


                    <?php get_template_part( 'content', get_post_format() ); ?>


                <?php   

                $counter++; //Update the counter

            endwhile;

               // pietergoosen_pagination();  

                wp_reset_postdata();

            else : 

                get_template_part( 'content', 'none' );

        endif; ?>


    </main><!-- #main -->
	</div><!-- #primary -->
    <?php get_sidebar( ); ?>

</div><!-- #main-content -->

<?php
get_footer();	