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
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<span class="post-date"><?php the_date(); ?></span>
						<span class="category"><?php
						// the_category();
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if($categories){
								foreach($categories as $category) {
									$output .= '<a class="myCategory" href="'.get_category_link( $category->term_id ).'"title="'.esc_attr( sprintf( __( "%s" ), $category->name ) ).'" rel="category tag" >'.$category->cat_name.'</a>'.$separator;
								}
						echo trim($output);
						}
						?></span>

						<p class="extract post-content text-justify">
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

				<div class="row">
					<div class="col-md-12">
						<div id="comments">
							<h3>Iruzkinak</h3>
							<div class="col-md-12" id="coments_box">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>
				</div>

				<nav>
					<div class="center-block">
						<div class="my-pagination"> <!-- Show in extra small screens -->
							<div class="pull-left">
  								<?php previous_post_link('%link', '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>'); ?>
							</div>
							<div class="pull-right">
								<?php next_post_link('%link', '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>'); ?>
							</div>
						</div> <!-- end pagination -->
					</div> <!-- end center-block -->
				</nav>
			</section>

			<?php get_sidebar(); ?>

		</div> <!-- /. row-->
	</section> <!-- /. main container-->

	<?php get_footer(); ?>
