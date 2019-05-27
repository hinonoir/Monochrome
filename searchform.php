<?php
/**
 * Monochromeの検索フォーム。
 *
 * サイドバーに使用する。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<form method="get" class="searchform"
action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" placeholder="サイト内検索..." name="s" value="" class="searchfield" required>
	<input type="submit" class="searchsubmit fas" value="&#xf002; 検索">
</form>
