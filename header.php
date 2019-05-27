<?php
/**
 * Monochromeのヘッダーテンプレート。
 *
 * このヘッダーは全てのページに使用する。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="./images/YH.ico">
	<link rel="apple-touch-icon" href="./images/YH.ico">

	<!-- OGP設定 -->
	<?php get_template_part( 'ogp' ); ?>
	<?php wp_head(); ?>
</head>
<body>

	<!-- ==================== header ==================== -->
	<header>
		<div class="container">
			<div class="header-inner">
				<div class="header-catchphrase">
					<?php
					if ( is_front_page() ) {// TOPページのみh1タグ.
						echo '<h1 class="header-logo">';
					} else {
						echo '<p class="header-logo">';}
					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php bloginfo( 'name' ); ?>
						</a>
					<?php
					if ( is_front_page() ) {
						echo '</h1>';
					} else {
						echo '</p>';}
					?>
					<p class="catchphrase"><?php bloginfo( 'description' ); ?></p>
				</div><!-- /.header-catchphrase -->

			</div><!-- /.header-inner -->

		</div><!-- /.container -->

		<!-- ==================== nav ==================== -->
		<nav>
			<div class="container">
				<ul class="navbar">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'global',
							'container'      => '',
							'menu_class'     => '',
							'items_wrap'     => '%3$s', // <ul>を出力しない
						)
					);
					?>
				</ul>
			</div><!-- /.container -->
		</nav>
		<!-- ==================== /nav ==================== -->

		<!-- ==================== .drawer-nav ==================== -->
		<nav class="drawer-nav" role="navigation">
			<!-- メニューボタン -->
			<button class="menu-btn">
				<span></span>
			</button>

			<ul class="drawer-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'drawer',
						'container'      => '',
						'menu_class'     => '',
						'items_wrap'     => '%3$s', // <ul>を出力しない
					)
				);
				?>
			</ul>

		</nav><!-- /drawer-nav -->
		<!-- ==================== /.drawer.nav ==================== -->

	</header>
	<!-- ==================== /header ==================== -->
