<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>aldakur.net</title>
		<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
		<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/responsive.css">
		<?php wp_head(); ?>
	</head>
<body>

	<header>
	 <div class="container">
		<nav class="navbar navbar-default menu" >
		 
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		    
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php /*wp_nav_menu( 
				array(
				'container' => false,
				'items_wrap' => '<ul class="nav navbar-nav menu-items" id="menu-top">%3$s</ul>',  
				'theme_location' => 'menu'  
				)); */


				/* Primary navigation */
				wp_nav_menu( array(
				  'menu' => 'top_menu',
				  'depth' => 2,
				  'container' => false,
				  'menu_class' => 'nav navbar-nav menu-items',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);

				?>

				<?php get_search_form(); ?> <!-- This render searchform.php -->

		    </div><!-- /.navbar-collapse -->
		 
		</nav><!-- /.navbar -->
	 </div><!-- /.container -->
<?php //} ?>
	</header>