<?php
/**
 * Template part for displaying content on page.php.
 *
 * @package easthill
 */
?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
									<header class="entry-header">
										<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									</header>
                                    <div class="featured-img">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'easthill-featured' );
                                        }
										?>    
                                    </div>
                                    <div class="entry-content">
										<?php
                                            the_content( sprintf(
                                                /* translators: %s: Name of current post. */
                                                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'easthill' ), array( 'span' => array( 'class' => array() ) ) ),
                                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                            ) );

                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'easthill' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
		                        </div>
					</article>
