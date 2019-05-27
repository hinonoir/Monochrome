<?php
/**
 * Monochromeのトップページ。
 *
 * トップページで表示する。
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

					<?php
					// ページ情報取得.
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$args  = array(
						'post_type'      => array( 'post' ),
						'post_status'    => array( 'publish' ),
						'order'          => 'desc',
						'orderby'        => 'post_date',
						'paged'          => $paged,
						'posts_per_page' => 10,
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
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

				</div><!-- /.main-inner -->

				<?php
				// ページネーション.
				wp_reset_postdata();

				$big = 999999999;

				echo paginate_links(
					array(
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'type'      => 'list',
						'format'    => '?paged=%#%',
						'current'   => max( 1, get_query_var( 'paged' ) ),
						'total'     => $query->max_num_pages,
						'prev_text' => '<前へ',
						'next_text' => '次へ>',
						'end_size'  => 1,
						'mid_size'  => 0,
					)
				);
				?>

			</main>
			<!-- ==================== /main ==================== -->

			<!-- ==================== sidebar.php ==================== -->
			<?php get_sidebar(); ?>


		</div><!-- /.content-wrapper -->
	</div><!-- /.container -->
</div><!-- /.content -->

<!-- ==================== footer.php ==================== -->
<?php get_footer(); ?>
