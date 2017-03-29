<?php
/**
 * Template part for displaying slider on homepage.
 *
 * @package easthill
 */

$easthill_slideshow_image_caption = get_theme_mod( 'easthill_slideshow_caption' , '0' );
$easthill_slideshow_category = get_theme_mod( 'easthill_slider_category_select' , '' );

 if ( $easthill_slideshow_category )
	{


    $feature_img_qry = new WP_Query( array(
        'post_type'     => 'post',
        'posts_per_page'=> 6,
		'cat' => $easthill_slideshow_category,
        'ignore_sticky_posts' => true
    ) );
    	?>
			<div class="slider">
				<div class="container">
					<div class="flexslider">
						<ul class="slides">
							<?php
                                if ( $feature_img_qry->have_posts() ){
                                while( $feature_img_qry->have_posts() ){
                                $feature_img_qry->the_post();
                            ?>
                                <li>
									<?php
										if ( has_post_thumbnail() ) {
											echo '<div class="post-thumbnail">';
											the_post_thumbnail( 'easthill-slider' );
											echo '</div>';
	                                    }
									?>
									<?php if($easthill_slideshow_image_caption){?>
                                      <div class="banner-text">
                                            <div class="text">
                                                <h2><?php the_title(); ?></h2>
                                                <?php the_excerpt(); ?>
                                                <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading', 'easthill'); ?></a>
                                            </div>
                                      </div>
                                    <?php } ?>
                                </li>
							<?php
								}
								}
								wp_reset_postdata();
                            ?>
						</ul>
					</div>
				</div>
			</div>
<?php } ?>
