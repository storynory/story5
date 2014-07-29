<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<!-- Google Chrome Frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php //echo basic_wp_seo(); ?>

	<!-- mobile meta (hooray!) -->
	<meta name="HandheldFriendly" content="True" />
	<meta name="MobileOptimized" content="320" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<!-- or, set /favicon.ico for IE10 win -->
			<meta name="msapplication-TileColor" content="#f01d4f" />
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png"/>

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<!-- wordpress head functions -->
			<?php wp_head(); ?>
			<!-- end of wordpress head -->

			<!-- drop Google Analytics Here -->
			<!-- end analytics -->
<!--[if lt IE 9]>

<script src="/wp-content/themes/story5/library/js/respond.js" />

<![endif]-->


</head>



		<body>
			<nav class="nav dropper">

				<ul class="menu--group">
					<li class="left">
						<a href="/"> <h3 class="menu-title"><span class="icon icon-home"></span><span class="title">Home</span></h3></a>
					</li>	
					<li class="drop left">	
						<a class="drop__title false" href="#">
							<h3 class="menu-title">
								<span class="icon icon-headphones"></span>
								<span class="title">Stories </span>
								<span class="icon-right icon-open-close"></span>
							</h3>
						</a>
						
						<ul class="bordered">
							<li>
								<a class="original" href="/archives/">
									<span class="icon icon-balloon"></span>
									<span class="fancy">Original Stories</span>
								</a>
							</li>


							<li>
								
									<a class="fairytales" href="/archives/fairy-tales/">
										<span class="icon icon-wand"></span>
										<span class="fancy">Fairytales</span>
									</a>
							</li>

							<li>
								<a class="classic" href="/archives/classic-authors/">
									<span class="icon icon-book2"></span>
									<span class="fancy">Classic Audio Books</span>
								</a>
							</li>

							<li>
								<a class="edu" href="/educational-stories/">
									<span class="icon icon-graduation"></span>
									<span class="fancy">Educational Stories</span>
								</a>
							</li>
							<li>
								<a class="myths" href="/archives/myths-world-stories/">
									<span class="icon icon-earth"></span>
									<span class="fancy">Myths and World Stories</span>
								</a>
							</li>
							<li>
								<a class="junior" href="/archives/stories-for-younger-children/">
									<span class="icon icon-happy">
									</span>
									<span class="fancy">Junior Stories</span>
								</a>
							</li>
							<li>
								<a class="music" href="/archives/poems-music/">
									<span class="icon icon-music"></span>
									<span class="fancy">Poems and Music</span>
								</a>
							</li>
							
						</ul>
					</li>
					<li class="drop left">
						<a  class="drop__title" href="#">
							<h3 class="menu-title">
								<span class="icon icon-info "></span>
								<span class="title">About</span>
								<span class="icon-right icon-open-close"></span>
							</h3>
						</a>
						<ul class="bordered">
							<li>
								<a href="about-storynory/start/">
									<span class="icon icon-question"></span>
									<span class="fancy">Where do I start?</span>
								</a>
							</li>
					<li>
            <a href="/2009/04/08/faq/"><span class=
            "icon icon-support"></span><span class="fancy">Help and
            FAQ</span></a>
        </li>

        <li>
            <a href="/about-storynory/contact/"><span class=
            "icon icon-address-book"></span><span class=
            "fancy">Contact</span></a>
        </li>

        <li>
            <a href="/about-storynory/privacy/"><span class=
            "icon icon-sunglasses"></span><span class="fancy">Privacy,Cookies,
            Copyright, T&amp;C</span></a>
        </li>

        <li>
            <a href="/about-storynory/people/"><span class=
            "icon icon-users"></span><span class="fancy">Our People</span></a>
        </li>

        <li>
            <a href="/2014/07/28/benefits-audio-books-children/"><span class=
            "icon icon-headphones"></span><span class="fancy">Benefits of Audio
            Books For Children</span></a>
        </li>

        <li>
            <a href="/category/kidding/"><span class=
            "icon icon-bullhorn"></span><span class="fancy">News</span></a>
        </li>

        <li>
            <a href="/about-storynory/story/"><span class=
            "icon icon-book"></span><span class="fancy">Our Own
            Story</span></a>
        </li>

        <li>
            <a href="/about-storynory/donate/"><span class=
            "icon icon-coins"></span><span class="fancy">Donate and Support
            Us</span></a>
        </li>
						</ul>
					</li>

					<li class="left">
						<a href="/storyapps/">
							<h3 class="menu-title"><span class="icon icon-podcast"></span>
								<span class="title">Apps</span>
							</h3>
						</a>
					</li>	

					<li class="left drop">
						<a class="drop__title false">
							<h3 class="menu-title">
								<span class="icon icon-share"></span>
								<span class="title">Share</span>
							</h3>
						</a>
						<ul class="bordered">
							<li><a href="#"><span class="fancy">You must be 13 or over to use social media or email subscription</span></a></li>
							<li><a href="http://feedburner.google.com/fb/a/mailverify?uri=Storynory&loc=en_US"><span class=
            "icon icon-mail-send"></span><span class="fancy">Stories by email</span></a></li>							
							<li><a href="https://www.facebook.com/Storynory"><span class=
            "icon icon-facebook"></span><span class="fancy">Facebook</span></a></li>
							<li><a href="https://plus.google.com/117579767918946827158/posts"><span class=
            "icon icon-googleplus"></span><span class="fancy">Google + </span></a></li>
							<li><a href="https://twitter.com/storynory"><span class=
            "icon icon-twitter"></span><span class="fancy">Twitter </span></a></li>
            							<li><a href="http://feeds.feedburner.com/storynory"><span class=
            "icon icon-feed"></span><span class="fancy">RSS podcast feed </span></a></li>
						</ul>	


					</li>	
				</ul>	
			




			</nav>	

			<div class="wrap">