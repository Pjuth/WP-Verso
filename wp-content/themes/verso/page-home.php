<?php /*
Template Name: Homepage
Description: A Page Template for custom page.
*/
get_header(); ?>

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<div id="main-content" class="visual-container">
        <div class="rte">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="name-wrapper">
                            <div id="man-name"><?php echo (types_render_field( "man-name")); ?></div>
                            <div id="bride-name"><?php echo (types_render_field( "bride-name")); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="couple">
                            <div id="bride">
                                <h4><?php echo (types_render_field( "bride-name")); ?></h4>
                                <p><?php echo (types_render_field( "bride-description")); ?></p>
                            </div>
                            <div id="couple-photo"><?php echo (types_render_field( "couple-photo", array('height' => '450', 'width'=>'550', 'resize' => 'crop') )); ?></div>
                            <div id="man">
                                <h4><?php echo (types_render_field( "man-name")); ?></h4>
                                <p><?php echo (types_render_field( "man-description")); ?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="date">
                    <div class="row">
                        <div class="col-md-2">
	                        <p class="title"><?php _e("save the date", "itb"); ?></p>
                        </div>
                        <div class="col-md-10">
                        <div id="counter-wrapper">
                            <h3><?php echo (types_render_field( "wedding-date", array( 'format' => 'F jS Y'))); ?></h3>
                            <p><?php echo (types_render_field( "man-description")); ?></p>
                            <div id="counter">
                                <div class="counter-number-wrapper">
	                                <?php $x = types_render_field( "wedding-date", array( 'format' => 'j F Y')); ?>
                                    <?php echo do_shortcode("[countdown date='$x' format=\"DHMS\"]"); ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="events">
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title"><?php _e("wedding events", "itb"); ?></p>
                        </div>
                        <div class="col-md-10">
                            <div id="events-wrapper">
                                <?php
                                $args = array( 'post_type' => 'event', 'posts_per_page' => 999 );
                                $loop = new WP_Query( $args );
                                $i = 0;
                                // var_dump($loop);
                                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php if($i % 2) { ?>
                                        <div class="event-wrapper">
                                            <a class="event-item" href="<?php the_permalink() ?>">
                                                <div class="event-img-wrapper">
                                                    <?php echo (types_render_field( "event-image", array('height' => '300', 'width'=>'300', 'resize' => 'crop') )); ?>
                                                </div>
                                                <div class="event-description">
                                                    <h4><?php the_title(); ?></h4>
                                                    <h5><?php echo (types_render_field( "event-date", array( 'format' => 'l F jS, G:i '))); echo (types_render_field( "event-locatiion" )); ?> <h5>

                                                    <?php the_excerpt(); ?>

                                                </div>
                                            </a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="event-wrapper">
                                            <a class="event-item" href="<?php the_permalink() ?>">
                                                <div class="event-description">
                                                    <h4><?php the_title(); ?></h4>
                                                    <h5><?php echo (types_render_field( "event-date", array( 'format' => 'l F jS, G:i '))); echo (types_render_field( "event-locatiion" )); ?> <h5>
					                                        <?php the_excerpt(); ?>
                                                </div>
                                                <div class="event-img-wrapper" style="float: right;">
			                                        <?php echo (types_render_field( "event-image", array('height' => '300', 'width'=>'300', 'resize' => 'crop') )); ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php $i++; endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bridegroom">
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title"><?php _e("bridesmaids groomsmen", "itb"); ?></p>
                        </div>
                        <div class="col-md-10">
                            <div class="gm-wrapper">
                                <?php
                                    $args = array( 'post_type' => 'maid-and-groom', 'posts_per_page' => 999 );
                                    $loop = new WP_Query( $args );
                                    // var_dump($loop);
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php if((types_render_field( "role" )) == 'Bridesmaid') { ?>
                                            <div class="gm-item">
                                                <div class="gm-item-img"><?php echo (types_render_field( "maid-groom-photo", array('height' => '280', 'width'=>'260', 'resize' => 'crop') )); ?></div>
                                                <div class="gm-title"><?php the_title(); ?></div>
                                            </div>
                                        <?php }  ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                            <div class="gm-wrapper">
	                            <?php
	                            $args = array( 'post_type' => 'maid-and-groom', 'posts_per_page' => 999 );
	                            $loop = new WP_Query( $args );
	                            // var_dump($loop);
	                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
		                            <?php if((types_render_field( "role" )) == 'Groomsmen') { ?>
                                        <div class="gm-item">
                                            <div class="gm-item-img"><?php echo (types_render_field( "maid-groom-photo", array('height' => '280', 'width'=>'260', 'resize' => 'crop') )); ?></div>
                                            <div class="gm-title"><?php the_title(); ?></div>
                                        </div>
		                            <?php }  ?>
	                            <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="attending">
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title"><?php _e("are you attending", "itb"); ?></p>
                        </div>
                        <div class="col-md-10">
                            <div class="at-wrapper">
	                            <?php echo do_shortcode("[contact-form-7 id=\"59\" title=\"Are you attending\"]"); ?>
                                <p>* <?php echo (types_render_field( "man-description")); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gifts">
                    <div class="row">
                        <div class="col-md-2">
                            <p class="title"><?php _e("gifts list", "itb"); ?></p>
                        </div>
                        <div class="col-md-10">
                            <div class="gifts-wrapper">
	                            <?php
	                            $args = array( 'post_type' => 'gift', 'posts_per_page' => 999 );
	                            $loop = new WP_Query( $args );
	                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="gift-item zoom-gallery">
                                        <a href="<?php echo (types_render_field( "gift-img", array('output' => 'raw') )); ?>" title="<?php the_title(); ?>">
		                                    <?php echo (types_render_field( "gift-img", array('height' => '110', 'width'=>'260', 'resize' => 'crop') )); ?>
                                        </a>
                                    </div>
	                            <?php endwhile; wp_reset_postdata(); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
				
			<?php endwhile; endif; ?>

<?php get_footer(); ?>