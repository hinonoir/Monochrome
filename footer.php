<?php
/**
 * Monochromeのフッター。
 *
 * このフッターは全てのページに使用する。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<footer>
	<div class="container">
		<div class="footer-inner">
			<div class="footer-widget">
				<div class="widget-item aboutme">
					<h4 class="widgettitle">About me</h4>
					<hr>
					<?php if ( is_active_sidebar( 'under_content1' ) ) {
						dynamic_sidebar( 'under_content1' );
					} ?>
				</div><!-- /.aboutme -->

				<div class="widget-item portfolio">
					<h4 class="widgettitle">Portfolio</h4>
					<hr>
					<?php if ( is_active_sidebar( 'under_content2' ) ) {
						dynamic_sidebar( 'under_content2' );
					} ?>
				</div><!-- /.portfolio -->

				<div class="widget-item twitter">
					<h4 class="widgettitle">Twitter</h4>
					<hr>
					<?php if ( is_active_sidebar( 'under_content3' ) ) {
						dynamic_sidebar( 'under_content3' );
					} ?>
				</div><!-- /.twitter -->
			</div><!-- /.footer-widget -->
		</div><!-- /.footer-inner -->
	</div><!-- /.container -->

	<!-- フッターナビゲーション -->
		<p class="footer-copyright">
		&copy; Yuto Hino 2019
		</p><!-- /.footer-copyright -->
</footer>
<?php wp_footer(); ?>
</body>
</html>
