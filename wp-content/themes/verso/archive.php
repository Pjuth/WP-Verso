<?php get_header(); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php single_cat_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<a class="col-md-4 archive-item" href="<?php the_permalink(); ?>">
					<div class="arch-image">
						<?php the_post_thumbnail('first-size'); ?>
					</div>
					<div class="arch-content">
						<h2><?php the_title(); ?></h2>
						<p><?php echo strip_tags(get_the_excerpt()); ?></p>
					</div>
				</a>

			<?php endwhile; endif; ?>
		</div>
	</div>


<?php get_footer(); ?>