<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package easthill
 */
 
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function easthill_body_classes( $classes ) {
  
	if ( ! is_active_sidebar( 'sidebar-main' ) ) {	
		$classes[] = 'full-width-narrow';
	}    
	
	else {
		$classes[] = '';
	}

	return $classes;
}
add_filter( 'body_class', 'easthill_body_classes' ); 

/**
 * Callback function for Featured Post
*/

if ( ! function_exists( 'easthill_featured_post_cb' ) ) :

function easthill_featured_post_cb(){
    
    $easthill_featured_title      = get_theme_mod( 'easthill_featured_section_title' );
    $easthill_featured_category      = get_theme_mod( 'easthill_featured_category_select' );	
    
    if( $easthill_featured_category ){
        
        $qry = new WP_Query( array( 
            'post_type'             => 'post',
            'posts_per_page'        => 3,
			'cat' => $easthill_featured_category,
            'ignore_sticky_posts'   => true,
        ) );
        
        if( $qry->have_posts() ){
            ?>
            <div class="top-section">
        		<div class="container">
                    
                   <?php if( $easthill_featured_title ) echo '<h1 class="section-title">' . esc_html( $easthill_featured_title ) . '</h1>'; ?>
                    
                   <div class="row">
                    <?php
                    while( $qry->have_posts() ){
                        $qry->the_post();
                        $categories_lists = get_the_category();
                        ?>
                        <div class="column">
        					<article class="post">
        						<?php if( has_post_thumbnail() ){ ?>
                                <div class="image-holder">
        							<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'easthill-vertical-long' ); ?></a>
        						</div>
                                <?php } ?>
        						<header class="entry-header">
        							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        							<div class="entry-meta">
        								<span><?php echo esc_html( get_the_date() ); ?></span>
        							</div>
        						</header>
        					</article>
        				</div>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php             
        }
        wp_reset_postdata();
    }
}
add_action( 'easthill_featured_post', 'easthill_featured_post_cb' );

endif;

/**
 * Footer Credits
*/
if ( ! function_exists( 'easthill_footer_credit' ) ) :

function easthill_footer_credit(){

    $text  = '<div class="copyright">';
    $text .=  esc_html__( 'Copyright &copy; ', 'easthill' ) . date_i18n( 'Y' );
    $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    $text .= '</div><span class="by">';
    $text .= '<a href="' . esc_url( 'http://thememunk.com/theme/easthill/' ) .'" rel="author" target="_blank">' . esc_html__( 'Theme Easthill by ThemeMunk', 'easthill' ) .'</a>. ';
    $text .= sprintf( esc_html__( 'Powered by %s', 'easthill' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'easthill' ) ) .'" target="_blank">WordPress</a>.' );
    $text .= '</div>';

    echo apply_filters( 'easthill_footer_text', $text );
}

add_action( 'easthill_footer', 'easthill_footer_credit' );

endif;



/**
 * Callback function for Homepage Post
*/
if ( ! function_exists( 'easthill_homepage_post_cb' ) ) :

function easthill_homepage_post_cb(){
               
        $qry = new WP_Query( array( 
            'post_type' => 'post',
			'ignore_sticky_posts' => 1,			
        ) );
        
        if( $qry->have_posts() ){
            ?> 
                   <div class="row">
						 <?php
                            while( $qry->have_posts() ){
                                $qry->the_post();
        
                                    get_template_part( 'template-parts/content', get_post_format() );                        
                                    
                            }
                        ?>
                    </div>
        <?php             
        }		
        wp_reset_postdata();				
}
add_action( 'easthill_homepages_posts', 'easthill_homepage_post_cb' );

endif;