<?php
/**
 * Monochromeのカテゴリーページ。
 *
 * 選択したカテゴリーを表示する。
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
				<div class="main-inner-articles">

				  <h1 class="search-title"><?php echo get_the_archive_title(); ?></h1>

					<?php
					// ページ情報取得.

					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<!-- ループ処理開始 -->

							<article>
								<a href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) : // サムネイルがあれば. ?>
										<?php the_post_thumbnail(); ?>
									<?php else : // サムネイルが無ければ. ?>
										<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/no-image.png' ); ?>" alt="no-image.png">
									<?php endif; ?>
									<div class="post-text">
										<h2 class="post-title"><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
										<p class="post-category">
										<?php
										foreach ( ( get_the_category() ) as $cat ) {
											echo $cat->name . ' '; }
										?>
										</p>
										<p class="post-time"><i class="fas fa-pencil-alt"></i> <?php the_time( 'Y/m/d' ); ?></p>
									</div><!-- /.post-date -->
								</a>
							</article>

							<!-- ループ処理終了 -->
							<?php
						endwhile;
						endif;
					?>

					<?php
					// ページネーション.
					wp_reset_postdata();

					$big = 999999999;

					echo paginate_links(
						array(
							'type'      => 'list',
							'format'    => '?paged=%#%',
							'prev_text' => '<前へ',
							'next_text' => '次へ>',
							'end_size'  => 1,
							'mid_size'  => 0,
						)
					);
					?>

				</div><!-- /.main-inner -->
			</main>
			<!-- ==================== /main ==================== -->

			<!-- ==================== sidebar.php ==================== -->
			<?php get_sidebar(); ?>


		</div><!-- /.content-wrapper -->
	</div><!-- /.container -->
</div><!-- /.content -->

<!-- ==================== footer.php ==================== -->
<?php get_footer(); ?>
