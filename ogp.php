<?php
/**
 * MonochromeのOGP設定
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<!-- OGP設定 -->
<meta property="fb:app_id" content="【App ID】" />
<meta property="fb:admins" content="【FB Admin】" />
<!-- 標準サイズ -->
<!-- <meta name="twitter:card" value="summary"/> -->
<!-- 大きいサイズ -->
<meta name="twitter:card" value="summary_large_image"/>
<meta name="twitter:site" value="@hinonoir64" />
<meta name="twitter:creator" value="@hinonoir64" />
<meta name="twitter:title" value="<?php the_title( '' ); ?>"/>
<meta name="twitter:description" value="<?php echo get_post_meta( $post->ID, _aioseop_description, true ); ?>"/>

<!-- 個別記事の場合 -->
<?php if ( is_single() ) { ?>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:title" content="<?php the_title( '' ); ?>" />
<meta property="og:description" content="<?php echo get_post_meta( $post->ID, _aioseop_description, true ); ?>" />
<meta property="og:type" content="article" />
	<?php
	if ( has_post_thumbnail() ) { // アイキャッチがある場合.
		$image_id = get_post_thumbnail_id();
		$image    = wp_get_attachment_image_src( $image_id, 'full' );
		echo '<meta property="og:image" content="' . $image[0] . '" />'; // FBのアイキャッチ画像.
		echo '<meta name="twitter:image" value="' . $image[0] . '" />'; // FBのアイキャッチ画像.
	} else { // アイキャッチがない場合任意の画像を表示.
		echo '<meta property="og:image" content="【画像リンク（httpから始まる）】'; // 指定の画像.
		echo '<meta property="og:image" content="【画像リンク（httpから始まる）】'; // 指定の画像.
	}
	?>

<!-- 個別記事以外の場合 -->
<?php } else { ?>
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
<meta property="og:description" content="<?php echo get_post_meta( $post->ID, _aioseop_description, true ); ?>" />
<meta property="og:type" content="website" />
<!-- 任意の画像を表示 -->
<meta property="og:image" content="【画像リンク（httpから始まる）】" />
<meta name="twitter:image" value="【画像リンク（httpから始まる）】" />
<?php } ?>
<!-- /OGP設定 -->
