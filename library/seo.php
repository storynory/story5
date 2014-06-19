<?php function basic_wp_seo() {

if (is_admin()) {
	return;
}
	global $page, $paged, $post;
	$default_keywords = 'HR recruitment search'; // customize
	$output = '';

	// description
	$seo_desc = get_post_meta($post->ID, 'mm_seo_desc', true);
	$description = get_bloginfo('description', 'display');
	$pagedata = get_page($post->ID);
	if (is_singular()) {
		if (!empty($seo_desc)) {
			$content = $seo_desc;
		} else if (!empty($pagedata)) {
			$content = apply_filters('the_excerpt_rss', $pagedata->post_content);
			$content = substr(trim(strip_tags($content)), 0, 155);
			$content = preg_replace('#\n#', ' ', $content);
			$content = preg_replace('#\s{2,}#', ' ', $content);
			$content = trim($content);
		} 
	} else {
		$content = $description;	
	}
	$output .= '<meta name="description" content="' . esc_attr($content) . '">' . "\n";

	
	// robots
	if (is_category() || is_tag()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ($paged > 1) {
			$output .=  "\t\t" . '<meta name="robots" content="noindex,follow">' . "\n";
		} else {
			$output .=  "\t\t" . '<meta name="robots" content="index,follow">' . "\n";
		}
	} else if (is_home() || is_singular()) {
		$output .=  "\t\t" . '<meta name="robots" content="index,follow">' . "\n";
	} else {
		$output .= "\t\t" . '<meta name="robots" content="noindex,follow">' . "\n";
	}

	// title
	$title_custom = get_post_meta($post->ID, 'mm_seo_title', true);
	$url = ltrim(esc_url($_SERVER['REQUEST_URI']), '/');
	$name = get_bloginfo('name', 'display');
	$title = trim(wp_title('', false));
	$cat = single_cat_title('', false);
	$tag = single_tag_title('', false);
	$search = get_search_query();

	if (!empty($title_custom)) $title = $title_custom;
	if ($paged >= 2 || $page >= 2) $page_number = ' | ' . sprintf('Page %s', max($paged, $page));
	else $page_number = '';

	if (is_home() || is_front_page()) $seo_title = $name . ' | ' . $description;
	elseif (is_singular())            $seo_title = $title . ' | ' . $name;
	elseif (is_tag())                 $seo_title = 'Tag Archive: ' . $tag . ' | ' . $name;
	elseif (is_category())            $seo_title = 'Category Archive: ' . $cat . ' | ' . $name;
	elseif (is_archive())             $seo_title = 'Archive: ' . $title . ' | ' . $name;
	elseif (is_search())              $seo_title = 'Search: ' . $search . ' | ' . $name;
	elseif (is_404())                 $seo_title = '404 - Not Found: ' . $url . ' | ' . $name;
	else                              $seo_title = $name . ' | ' . $description;

	$output .= "\t\t" . '<title>' . esc_attr($seo_title . $page_number) . '</title>' . "\n";

	return $output;
}
?>
		