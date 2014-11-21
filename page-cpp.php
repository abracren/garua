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
    $orderby        = isset( $post_meta['_cpt_order_by'] ) ? $post_meta['_cpt_order_by'][0] : 'date';
    $asc            = isset( $post_meta['_cpt_asc'] ) ? $post_meta['_cpt_asc'][0] : 'DESC';
    $post_count     = isset( $post_meta['_cpt_post_count'] ) ? $post_meta['_cpt_post_count'][0] : get_option('posts_per_page');
    if(!$post_count || !is_numeric( $post_count )) 
        $post_count = get_option('posts_per_page');
?>  
<div id="main-content" class="main-content">

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

    <!-- Page Title -->
    <?php if( $posts_title ) : ?>
        <article id="posts-title">
            <header class="entry-header">
                <h2 class="entry-title"><?php echo $posts_title; ?></h2>
            </header><!-- .entry-header -->
        </article><!-- #posts-title -->
    <?php endif; ?>

        <?php the_post(); ?>
        <?php global $post;
        if( $post->post_content || $page_title ) : ?>
        <div class="entry-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if( $page_title ) : ?>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo $page_title; ?></h1>
                    </header><!-- .entry-header -->

                <?php endif; ?>
            <?php if( $post->post_content ) : ?>    
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'pietergoosen' ) . '</span>', 'after' => '</div>' ) ); ?>
                </div><!-- .entry-content -->
                <footer class="entry-meta">

                </footer><!-- .entry-meta -->
            <?php endif; ?>
            </article><!-- #post-<?php the_ID(); ?> -->
        </div>  
        <?php endif; ?>

<?php 

/**-----------------------------------------------------------------------------
 *
 *  Start our custom query to display custom post type posts
 *
*------------------------------------------------------------------------------*/

        $args = array( 
            'post_type' => $posttype,
            'posts_per_page' => $post_count,
            'paged' => $paged,
            'order' => $asc,
            'ignore_sticky_posts' => 1,
        );

        if( $days ) {
            function pop_filter_where( $where = '') {
                global $days;
                    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-' .$days .' days')) . "'";
                return $where;
            }
            add_filter( 'posts_where', 'pop_filter_where' );
                $cpt_query = new WP_Query($args);
            remove_filter( 'posts_where', 'pop_filter_where' );
        } else {
            $cpt_query = new WP_Query($args);
        }

        // Output
        if ( $cpt_query->have_posts() ) :

            $counter = 1; //Starts counter for post column lay out

            // Start the Loop.
            while ( $cpt_query->have_posts() ) : $cpt_query->the_post(); ?>

                <div class="entry-column<?php echo ( $counter%2  ? ' left' : ' right' ); ?>">

                    <?php get_template_part( 'content', get_post_format() ); ?>

                </div>  

                <?php   

                $counter++; //Update the counter

            endwhile;

                pietergoosen_pagination();  

                wp_reset_postdata();

            else : 

                get_template_part( 'content', 'none' );

        endif; ?>


    </div><!-- #content -->
    </div><!-- #primary -->

    <?php get_sidebar( 'content' ); ?>

</div><!-- #main-content -->

<?php
get_footer();	