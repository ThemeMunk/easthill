<?php
/**
 * Template Name: Homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package easthill
 */

get_header(); ?>	

			<?php
            if( is_front_page() ){ // only works if this page is set as homepage in dashboard >> settings >> reading
            
            $ed_slideshow = get_theme_mod('easthill_ed_slideshow', '0'); //disabled by default
            
            if($ed_slideshow) {
                get_template_part( 'template-parts/content', 'slider' );
            }

            if( get_theme_mod( 'easthill_ed_featured_post', '0' ) ) do_action( 'easthill_featured_post' ); // featured posts on front page. Disabled by Default.
			
            }
            ?>
	
		
			<div id="content" class="site-content">
				<div class="container">
					<div class="row">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">

					    		<?php  do_action( 'easthill_homepages_posts' ); ?>								
								
							</main>
						</div>
						<?php get_sidebar(); ?>		                        
					</div>
				</div>
			</div>
<?php get_footer(); ?>
