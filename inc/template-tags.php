<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package easthill
 */

if ( ! function_exists( 'easthill_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function easthill_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )		
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'easthill' ),
		'<i class="fa fa-calendar"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html( '%s', 'post author', 'easthill' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'easthill_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function easthill_entry_meta() {

	easthill_posted_on();

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comment"><i class="fa fa-comment"></i>';
		comments_popup_link( esc_html__( 'Leave a comment', 'easthill' ), esc_html__( '1 Comment', 'easthill' ), esc_html__( '% Comments', 'easthill' ) );
		echo '</span>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function easthill_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'easthill_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'easthill_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so easthill_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so easthill_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in easthill_categorized_blog.
 */
function easthill_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'easthill_categories' );
}
add_action( 'edit_category', 'easthill_category_transient_flusher' );
add_action( 'save_post',     'easthill_category_transient_flusher' );
