<?php get_header(); ?>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<?php query_posts("paged=$paged" ); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<article class="post clearfix">
						<div class="thumb pull-left">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail', array('class' => 'img-thumbnail')); ?>
							</a>
						</div>
						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<span class="post-date"><?php the_date(); ?></span>
						<span class="category"><?php the_category(); ?></span>

						<p class="extract post-content text-justify">
							<?php the_excerpt();?> 
						</p>
						<div class="container-buttons pull-left">
							<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-more-info">Irakurri</a>
							<!-- <a href="#" class="btn btn-success">Comentarios <span class="badge">20</span></a> -->
						</div>
					</article>

				<?php endwhile; else: ?>
					<h2>Ez dira Postak aurkitu</h2>
				<?php endif; ?>
				
				<nav>
				
					<div class="center-block">
					<div class="navigation">
						<div class="my-pagination"> <!-- Show in extra small screens -->
							<div class="pull-left">
  								<?php previous_posts_link('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>'); ?>
							</div>
							<div class="pull-right">						
								<?php next_posts_link('<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>'); ?>
							</div>
						</div> <!-- end pagination -->
					</div> <!-- end center-block -->
				</nav>
			</section>

			<?php get_sidebar(); ?>

		</div> <!-- /. row-->
	</section> <!-- /. main container-->

	<?php get_footer(); ?>