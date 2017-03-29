<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package easthill
 */
if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>
			<!-- sidebar of the page -->
            <div id="secondary" class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-main' ); ?>
            </div>