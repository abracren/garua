<?php
//jQuery('#testtestarea1.wp-editor-area').val('bleble');

//temporal nonce
function garuafw_load_scripts($hook) {

    
  
    wp_localize_script('mxd-ajax', 'mxd_vars', array( 'mxd_nonce' => wp_create_nonce('mxd-nonce')));
       
    }



  
add_action('admin_enqueue_scripts','garuafw_load_scripts');

function garuafw_call_meta_box($post_type, $post)
{
   add_meta_box(
       'Editor',
       __('Editor', 'wr_plugin'),
       'garuafw_display_meta_box',
       'garua-template',
       'advanced',
       'default'
   );
}
add_action('add_meta_boxes', 'garuafw_call_meta_box', 10, 2);


function garuafw_display_meta_box($post, $args)
{
   //wp_nonce_field(plugins_url(__FILE__), 'wr_plugin_noncename');
?>
 <div class="garuafe-editor-wrap">
    <ul class="parts">
      <li class="part">
        one
      </li>
    </ul >
    <ul class="fields">
      <li class="slider-field field-section">

        <input name="field_1">
       <button id="buton1" type="button">Click Me!</button>
        <textarea name="testTestArea"> bla</textarea>
        
        </li>
    </ul>
 </div>
    <a id="testBut2" href="#"> test</a></br>

<div id="mxd_results"> 
    <!-- <textarea name="123"></textarea> -->
    </div> 
    <?php 
  echo'<div style="">';
  $nameee='bla1';
        $args = array(
      "textarea_name" => $nameee);

   
    wp_editor( 'contnet',$nameee, $args);
    echo'</div>';
?>
<?php
}
do_action( 'garuafw_load_scripts');
function mxd_get_ajax2(){
  if( !isset( $_POST['mxd_nonce'] ) || !wp_verify_nonce($_POST['mxd_nonce'], 'mxd-nonce') )
    die('Permissions check failed');  


 

  die();
   
}
//add_action('wp_ajax_mxd_get_results',  array($this,'mxd_get_ajax'));
add_action('wp_ajax_nopriv_mxd_get_results2', 'mxd_get_ajax2');
add_action('wp_ajax_mxd_get_results2',  'mxd_get_ajax2');


?>



