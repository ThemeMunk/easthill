<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package easthill
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="featured-img">
                                     <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'easthill-featured' );
                                        } ?>
                                    </a>
                                    </div>
                                    <div class="text-holder">
									<header class="entry-header">
										<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
									</header>
                                    <div class="entry-excerpt">
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
									</div>
						</article>
