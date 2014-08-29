<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="UTF-8">
	<!-- Google Chrome Frame and ie version -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" >
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php //echo basic_wp_seo(); ?>
	<!-- mobile meta (hooray!) -->
	<meta name="HandheldFriendly" content="True" />
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
				<a href="/"> <h3 class="menu-title"><span class="icon icon-home"></span><span class="title">Storynory</span></h3></a>
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
						<a class="junior" href="/category/small-stories/">
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
									<a href="/category/people/"><span class=
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
												<a href="/category/kidding/">
													<h3 class="menu-title"><span class="icon icon-bullhorn"></span>
														<span class="title">News</span>
													</h3>
												</a>
											</li>	
										</ul>	
									</nav>	
									<div class="wrap">