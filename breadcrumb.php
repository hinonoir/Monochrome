<?php
/**
 * パンくずリストファイル.
 *
 * リストを表示させたい位置にこちらのファイルを呼び出す.（構造マークアップ完了済み）.
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<div class="breadcrumb">

	<span class="" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<span itemprop="title">HOME</span>
		</a>&gt;&nbsp;
	</span>

	<?php if ( is_single() ) { ?>

		<span class="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="
			<?php
			$cat = get_the_category();
			echo get_category_link( $cat[0]->cat_ID );
			?>
			" itemprop="url">
				<span itemprop="title"><?php echo $cat[0]->name; ?></span>
			</a>&gt;&nbsp;
		</span>

	<?php } else { ?>
	<?php } ?>

	<strong class="bc-current-page"><?php the_title(); ?></strong>

</div>
