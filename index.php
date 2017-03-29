<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
