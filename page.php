<?php get_header(); ?>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<?php //query_posts("paged=$paged" ); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article class="post clearfix">
						<div class="thumb pull-left">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail', array('class' => 'img-thumbnail')); ?>
							
							</a>
						</div>
						<h2 class="post-title">
							<?php the_title(); ?>
						</h2>
						<hr/>
						<!--
						<span class="post-date"><?php the_date(); ?></span>
						<span class="category"><?php the_category(); ?></span>
						-->

						<p class="post-content text-justify">
							<?php the_content();?> 
						</p>

						<!--
						<div class="container-buttons pull-left">
							<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-more-info">Irakurri</a>

						</div>
						-->
					</article>
				<?php endwhile; else: ?>
					<h2>Ez dira Postak aurkitu</h2>
				<?php endif; ?>

			</section>

			<?php get_sidebar(); ?>

		</div> <!-- /. row-->
	</section> <!-- /. main container-->

	<?php get_footer(); ?>