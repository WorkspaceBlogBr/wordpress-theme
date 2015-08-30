<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximim-scale=1.0; user-scalable=no" />
		<title><?php workspace_title(); ?></title>
		
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.mobile.css">
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.3.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/tema.js"></script>
		<script src="//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=478400318884455" id="facebook-jssdk"></script>
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="fb-root"></div>
		<div id="page">
			<header>
				<nav id="nav_top">
					<div class="margem">
						<div id="nav_left">
							<?php wp_page_menu('show_home=1&sort_column=menu_order, post_title'); ?>
						</div>
						<div id="nav_right">
							<ul>
								<li>Inscreva-se:</li>
								<li><a href="http://feeds.feedburner.com/WorkspaceBlogBr" target="_blank">RSS Posts</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div id="header">
					<div class="margem">
						<div id="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo-worskpace.png" />
							</a>
						</div>
						<hgroup>
							<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2><?php bloginfo( 'description' ); ?></h2>
						</hgroup>
						<div id="buscar">
							<form action="<?php echo home_url( '/' ); ?>">
								<input placeholder="<?php print __('Buscar neste blog', 'workspace');?>" name="s" />
								<input type="image" src="<?php echo get_template_directory_uri(); ?>/images/icon/search.png" />
							</form>
						</div>
					</div>
				</div>
				<nav id="nav_center">
					<div class="margem">
						<ul>
							<?php $sem_cat_id = get_cat_ID('Sem categoria'); ?>
							<?php wp_list_categories("orderby=name&depth=2&hide_empty=0&title_li=&exclude=$sem_cat_id"); ?> 
						</ul>
					</div>
				</nav>
			</header>
			<div id="corpo" class="margem">