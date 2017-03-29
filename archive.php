<?php
/**
 * The template file for archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package easthill
 */

get_header(); ?>
			<div id="content" class="site-content">
				<div class="container">
					<div class="row">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">

											<?php
                        if ( have_posts() ) :
		                  ?>

                                    <header class="page-header">
                                        <?php
                                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                                        ?>
                                    </header><!-- .page-header -->

                                <?php

                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();

                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part( 'template-parts/content', get_post_format() );

                                        endwhile;
			                            			echo '<nav class="navigation pagination">';
                                         the_posts_pagination( array(
                                        'mid_size' => 3,
                                        'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'easthill' ),
                                        'next_text' => __( '<i class="fa fa-angle-right"></i>', 'easthill' ),
                                        ) );
																				echo '</nav>';

                                    else :

                                        get_template_part( 'template-parts/content', 'none' );

                                   endif;
                               ?>


							</main>
						</div>
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
