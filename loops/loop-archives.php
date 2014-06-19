 <?php if( have_posts() ) {
     	while ( have_posts() ) {
     		the_post(); ?>
     		<h1><?php the_title (); ?></h1>
     		<aside class="pullout gutter">
     			<?php the_content (); ?>

     		</aside>	



<?php	}
     		} else {
     	/* No posts found */
          } ?>

<?php if ( is_page( 13 ) ) {
		
		$parent = 107 ;
}

elseif ( is_page( 723 ) ) {
		
		$parent = 105 ;
}

elseif ( is_page( 727 ) ) {
		
		$parent = 8 ;
}


elseif ( is_page( 724 ) ) {
		
		$parent = 106 ;
}



	else {
		$parent = 107; 
	}


?>

 <?php $args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => $parent,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 
	)

?>

 <?php $categories = get_categories( $args ); ?> 


 <?php 
$count = 0;
$total = count($categories); ?>
	<div class="inline__item r-one-half">

<?php
 		foreach($categories as $category) {  

 
echo '<article class="gutter archives__item clearfix">';
    echo '<h3><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </h3> '; ?>
    

<?php
    echo '<figcaption>'. $category->description . '</figcaption>';
   // echo '<p class="media__item"> Post Count: '. $category->count . '</p>';

echo '</article>';
echo '</div><!-- --><div class="inline__item r-one-half">';

// avoid empty div at end of loop
$count ++;
$check = ($count ) / 2;
 if (is_int($check)) { ?>

<?php }
else {


}





}
 ?>

</div>