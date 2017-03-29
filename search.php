<?php
/**
 * The template file for searchr results page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package easthill
 */

get_header(); ?>			
			<div id="content" class="site-content">
				<div class="container">

				<div class="search-heading">
					<h1 class="search-title"><?php printf( __( 'Search Results for: %s', 'easthill' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>                    
				</div>                
                
					<div class="row">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">

								<?php
                                    if ( have_posts() ) :
                            
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
                            
                                            get_template_part( 'template-parts/content', 'search' );
                            
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
