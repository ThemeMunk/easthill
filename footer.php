<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package easthill
 */
?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<?php get_sidebar('footer'); ?>								
				<div class="site-info">
					<div class="container">
							<div class="col">
								<?php
									$socialheader = get_theme_mod('easthill_social_ed_footer', '0');
									$fb = get_theme_mod('easthill_button_url_fb');
									$tw = get_theme_mod('easthill_button_url_tw');
									$pin = get_theme_mod('easthill_button_url_pin');
									$insta = get_theme_mod('easthill_button_url_ins');
									$gplus = get_theme_mod('easthill_button_url_gp');																								
									if ($socialheader) {
									?>
									<ul class="social-networks">                        
										<?php if ($fb) { ?><li><a class="facebook" href="<?php echo esc_url($fb); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
										<?php if ($tw) { ?><li><a class="twitter" href="<?php echo esc_url($tw); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
										<?php if ($pin) { ?><li><a class="pinterest" href="<?php echo esc_url($pin); ?>"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
										<?php if ($insta) { ?><li><a class="instagram" href="<?php echo esc_url($insta); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
										<?php if ($gplus) { ?><li><a class="google-plus" href="<?php echo esc_url($gplus); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
									</ul>
									<?php
									}
                                ?>
							</div>                    
		                <?php do_action ('easthill_footer'); ?>
					</div>
				</div>
				</footer>
			</footer>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>
