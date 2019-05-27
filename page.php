<?php
/**
 * Monochromeの固定ページテンプレート。
 *
 * 固定ページに表示。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<!-- ==================== header.php ==================== -->
<?php get_header(); ?>

<div class="content">
	<div class="container">
		<div class="content-wrapper">

			<!-- ==================== main ==================== -->
			<main>
				<div class="main-inner-content">
					<article>
						<section>

							<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									?>
									<!-- ループ開始 -->

									<!-- パンくずリスト -->
									<?php get_template_part( 'breadcrumb' ); ?>
								<h1 class="post-title"><?php the_title(); ?></h1>

								<div class="article-content"><?php the_content(); ?></div>

									<!-- ループ終了 -->
									<?php
								endwhile;
							endif;
							?>

						</section>
					</article>
				</div><!-- /.main-inner-content -->
			</main>
			<!-- ==================== /main ==================== -->

			<!-- ==================== sidebar.php ==================== -->
			<?php get_sidebar(); ?>

		</div><!-- /.content-wrapper -->
	</div><!-- /.container -->
</div><!-- /.content -->

<!-- ==================== footer.php ==================== -->
<?php get_footer(); ?>
