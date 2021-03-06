<?php
add_shortcode('carousel', 'custom_gallery');
function gallery_js() { ?>
<script>
yepnope([{
    test : /* boolean(ish) - Something truthy that you want to test             */,
    yep  : /* array (of strings) | string - The things to load if test is true  */,
    nope : /* array (of strings) | string - The things to load if test is false */,
    both : /* array (of strings) | string - Load everytime (sugar)              */,
    load : /* array (of strings) | string - Load everytime (sugar)              */,
    callback : /* function ( testResult, key ) | object { key : fn }            */,
    complete : /* function                                                      */
}, ... ]);
</script>
<?php }
function custom_gallery($attr,$content,$tag) {
    global $post, $wp_locale;
    static $instance = 0;
    $instance++;
// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }
// add yeahnope to footer
    if ($tag == "carousel") {
        add_action ('wp_footer','gallery_js');
    }
# hard-coding these values so that they can't be broken  - seem to need this to make it work
    $attr['columns'] = 1;
    $attr['size'] = 'full';
    $attr['link'] = 'none';
    $attr['orderby'] = 'post__in';
    $attr['include'] = $attr['ids'];        
#Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);     
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
    $output .= '<ul class="media">';
    foreach ( $attachments as $id => $attachment ) {
        $caption =    get_post_field('post_excerpt', $id);
        $output .= '<li></figure>';
//if (is_int($check)){ } // if check is an integer
        $large_image = wp_get_attachment_image_src($id,'large',false);
        $output .= '<img src ="' . $large_image[0] .  '" />';
        $output .="<figcaption>". $caption . "</figcaption>" ;  
        $output .= '</figure></li>';
    }
    $output .= '</ul>';
    return $output;
}?>