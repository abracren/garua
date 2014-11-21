<?php
function wr_call_meta_box($post_type, $post)
{
   add_meta_box(
       'weather_box',
       __('Current Weather', 'wr_plugin'),
       'wr_display_meta_box',
       'garua-template',
       'advanced',
       'default'
   );
}
add_action('add_meta_boxes', 'wr_call_meta_box', 10, 2);

function wr_display_meta_box($post, $args)
{
   //wp_nonce_field(plugins_url(__FILE__), 'wr_plugin_noncename');
?>
   <p class="">
      bla
   </p>
<?php
}


?>