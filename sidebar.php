<?php
/**
 * Monochromeのサイドバー。
 *
 * このサイドバーは全てのページに使用する。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<aside role="sidebar" id="sidebar">
	<!-- ==================== 検索フォーム ==================== -->
	<div class="widget-item">
		<div class="widget">
			<?php get_search_form(); ?>
		</div><!-- /.widget -->
	</div><!-- /.widget-item -->
	<!-- ==================== /検索フォーム ==================== -->

	<!-- ==================== ウィジェット1（自己紹介） ==================== -->
	<div class="widget-item profile">
		<?php
		if ( is_active_sidebar( 'sidebar1' ) ) {
			dynamic_sidebar( 'sidebar1' );
		}
		?>
	</div><!-- /.widget-item -->
	<!-- ==================== /ウィジェット1（自己紹介） ==================== -->

	<!-- ==================== 最近の投稿一覧 ==================== -->
	<div class="widget-item">
		<h4 class="widgettitle">最近の投稿</h4>
		<?php if ( is_active_sidebar( 'sidebar2' ) ) {
			dynamic_sidebar( 'sidebar2' );
		} ?>
	</div><!-- /.widget-item -->
	<!-- ==================== /最近の投稿一覧 ==================== -->

	<!-- ==================== よく読まれている記事一覧 ==================== -->
	<div class="widget-item">
		<h4 class="widgettitle">よく読まれている記事</h4>
		<div class="widget">

			<?php
			// ループ開始.
			query_posts( 'meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC' );
			while ( have_posts() ) :
				the_post();
				?>

			<article>
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) : // サムネイルがあれば. ?>
						<?php the_post_thumbnail(); ?>
						<div class="post-text">
							<h5 class="post-title"><?php the_title(); ?></h5>
							<p class="post-category"><?php $postcat=get_the_category(); echo $postcat[0]->name; ?></p>
						</div><!-- /.post-text -->

					<?php else : // サムネイルが無ければ. ?>
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/no-image.png' ); ?>" alt="no-image.png">
						<div class="post-text">
							<h5 class="post-title"><?php the_title(); ?></h5>
							<p class="post-category"><?php $postcat=get_the_category(); echo $postcat[0]->name; ?></p>
						</div><!-- /.post-text -->
					<?php endif; ?>
				</a>
			</article>

			<?php endwhile; ?>
		</div><!-- /.widget -->
	</div><!-- /.widget-item -->
	<!-- ==================== /よく読まれている記事一覧 ==================== -->

	<!-- ==================== ウィジェット2（アーカイブ） ==================== -->
	<div class="widget-item">
		<h4 class="widgettitle">アーカイブ</h4>
			<?php
			if ( is_active_sidebar( 'sidebar3' ) ) {
				dynamic_sidebar( 'sidebar3' );
			}
			?>
	</div><!-- /.widget-item -->
	<!-- ==================== /ウィジェット2（アーカイブ） ==================== -->

	<!-- ==================== ウィジェット3（カテゴリー） ==================== -->
	<div class="widget-item">
		<h4 class="widgettitle">カテゴリー</h4>
		<?php
		if ( is_active_sidebar( 'sidebar4' ) ) {
			dynamic_sidebar( 'sidebar4' );
		}
		?>
	</div><!-- /.widget-item -->
	<!-- ==================== /ウィジェット3（カテゴリー） ==================== -->

</aside>
