<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package easthill
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>
		<div class="holder">
			<div class="widget-area">
					<div class="container">
						<div class="row">
							
                		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
                        <?php endif; ?>
                        
                		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
                        <?php endif; ?>
                        
                		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-3' ); ?>
                        <?php endif; ?>                                                                            
							
							
						</div>
					</div>
				</div>
		</div>
