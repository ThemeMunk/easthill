<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package easthill
 */

get_header(); ?>			
			<div id="content" class="site-content full-width">
				<div class="container">
					<div class="row">
						<div id="primary" class="content-area">
							<main id="main" class="site-main" role="main">

                                <article class="not-found">
                                    <span><?php esc_html_e( '404', 'easthill' ); ?></span>
                                    <h1><?php esc_html_e( 'Oops, The requested page cannot be found', 'easthill' ); ?></h1>                    
                                    <p><?php esc_html_e( 'Go back to the homepage.', 'easthill' ); ?></p>
                                    <a class="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'easthill' ); ?></a>   
                                </article>
								
								
							</main>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
