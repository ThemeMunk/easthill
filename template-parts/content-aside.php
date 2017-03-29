<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package easthill
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="featured-img">
                                     <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-thumbnail">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'easthill-featured' );
                                        } ?>
                                    </a>
                                    </div>
                                    <div class="text-holder">
                                    <div class="entry-excerpt">
                                            <?php
                                                the_excerpt( sprintf(
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
									<div class="entry-footer">
				                        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More &#8250;', 'easthill') ?></a>
									</div>
                                    </div>
						</article>
