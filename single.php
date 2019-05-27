<?php
/**
 * Monochromeの投稿記事テンプレート。
 *
 * 投稿記事の詳細ページ。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<?php
// View数カウント処理（「よく読まれている記事」に反映）.
if ( ! is_user_logged_in() && ! is_bot() ) {
	set_post_views( get_the_ID() ); }
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
								<p class="post-time"><i class="fas fa-pencil-alt"></i> <?php the_time( 'Y/m/d' ); ?></p>
								<h1 class="post-title"><?php the_title(); ?></h1>
								<!-- カテゴリー表示 -->
									<?php the_category(); ?>

								<div class="header-thumbnail">
									<?php if ( has_post_thumbnail() ) : // サムネイルがあれば. ?>
											<?php the_post_thumbnail( 'header-thumbnail' ); ?>
										<?php else : // サムネイルが無ければ. ?>
											<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/no-image.png' ); ?>" alt="no-image.png">
									<?php endif; ?>
								</div><!-- /.header-thumbnail -->

								<div class="article-content"><?php the_content(); ?></div>

									<!-- ループ終了 -->
									<?php
								endwhile;
							endif;
							?>

							<!-- SNSシェアボタン -->
							<?php get_template_part( 'sns' ); ?>

							<!-- 関連記事 -->
							<?php
							if ( has_category() ) {
									$cats    = get_the_category();
									$catkwds = array();
								foreach ( $cats as $cat ) {
										$catkwds[] = $cat->term_id;
								}
							}
							?>
							<?php
							$myposts = get_posts(
								array(
									'post_type'      => 'post',
									'posts_per_page' => '6',
									'post__not_in'   => array( $post->ID ),
									'category__in'   => $catkwds,
									'orderby'        => 'rand',
								)
							);
							if ( $myposts ) :
								?>

							<div class="related">
								<h4>関連記事</h4>
								<ul>
								<?php
								foreach ( $myposts as $post ) :
									setup_postdata( $post );
									?>

									<li>
										<a href="<?php the_permalink(); ?>">
											<div class="related-thumb">
												<?php if ( has_post_thumbnail() ) : // サムネイルがあれば. ?>
													<?php the_post_thumbnail(); ?>
										<?php else : // サムネイルが無ければ. ?>
											<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/no-image.png' ); ?>" alt="no-image.png">
										<?php endif; ?>
											</div>

											<div class="related-title">
												<?php the_title(); ?>
											</div>
										</a>
									</li>

								<?php endforeach; ?>
								</ul>
							</div>
								<?php
								wp_reset_postdata();
							endif;
							?>
							<!-- /関連記事 -->

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
