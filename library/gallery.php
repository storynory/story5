<?php 

//http://wordpress.stackexchange.com/questions/4343/how-to-customise-the-output-of-the-wp-image-gallery-shortcode-from-a-plugin
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );

function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
           $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    
    $output .=  '<div class="carousel-wrap logo-wrap">';
    $output .= '<div id="logos" class="carousel">';
    $output .= '<ul class="slides logos carousel__slides carousel-horizontal"><li>';
    $count = 0;
    $length =  count($attachments);
    foreach ( $attachments as $id => $attachment ) {

                    $count ++;
                   $check = ($count - 0 ) / 3;
                    //if (is_int($check)){ } // if check is an integer
    	$large_image = wp_get_attachment_image_src($id,'large',false);
       
    	$output .= '<img src ="' . $large_image[0] .  '" class="blank" />';
       // $output .= " check ";
          if (is_int($check) && $count != $length ){  // if check is an integer
    	$output .='</li><li>';
             // $output .= " checked ";
    }
   
    }
   
   $output .= '</li></ul>';
   $output .= '</div>';
 // $output .='<div class="page-control page-control-logos">';
  // 	$output .='<a href="#" class="prev">&#xe002;</a>';
   //$output .='<a href="#" class="next">&#xe001;</a>';
   //$output .= '</div>';
   $output .= '</div>';

	
    return $output;
  
}


?>