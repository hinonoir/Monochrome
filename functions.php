<?php
/**
 * Monochromeのfunction.php。
 *
 * 機能、関数を格納する。
 *
 * @package WordPress
 * @subpackage Monochrome
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function add_files() {
	add_theme_support( 'post-thumbnails' );// サムネイル表示.
	set_post_thumbnail_size( 486, 290, true );// サムネイルトリミング.
	add_image_size( 'header-thumbnail', 680, 300, true );// 投稿記事のヘッダー画像.
	add_theme_support( 'title-tag' );// titleタグをhead内に生成.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );// HTML5でマークアップ.
}
add_action( 'after_setup_theme', 'add_files' );

/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function script_init() {
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/style.css', array(), '1.0.0' );// head内でstyle.cssを呼ぶ.
	wp_enqueue_style( 'header-logo', '//fonts.googleapis.com/css?family=Kosugi+Maru|Montserrat:600', array(), '1.0.0' );// head内でGoogle Fontsを呼ぶ.
	wp_enqueue_style( 'submenu-icon', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '1.0.0' );// head内でFont Awesomeを呼ぶ.
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/main.min.js', array( 'jquery' ), '1.0.0', true );// main.jsはフッターで読み込む.
}
add_action( 'wp_enqueue_scripts', 'script_init' );

/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function menu_init() {
	register_nav_menus(
		array(
			'global'  => 'グローバル',
			'utility' => 'ユーティリティ',
			'drawer'  => 'ドロワーメニュー',
			'sidebar' => 'サイドメニュー',
			'footer'  => 'フッター',
		)
	);
}
add_action( 'init', 'menu_init' );

/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function widget_init() {
	register_sidebar(
		array(
			'name'          => 'サイドバー1',
			'id'            => 'sidebar1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'サイドバー2',
			'id'            => 'sidebar2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'サイドバー3',
			'id'            => 'sidebar3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'サイドバー4',
			'id'            => 'sidebar4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'コンテンツ下1',
			'id'            => 'under_content1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'コンテンツ下2',
			'id'            => 'under_content2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'コンテンツ下3',
			'id'            => 'under_content3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'widget_init' );

/**
 * ウィジェットのタイトル非表示用フィルター
 */
add_filter( 'widget_title', 'remove_widget_title_all' );
function remove_widget_title_all( $widget_title ) {
	return;
}

/**
 * 人気記事出力
 */
function get_post_views( $post_id ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $post_id, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
		return '0 View';
	}
	return $count . ' Views';
}
function set_post_views( $post_id ) {
	// 記事のアクセス数を保存.
	$count_key = 'post_views_count';
	$count     = get_post_meta( $post_id, $count_key, true );
	if ( $count == '' ) {
					$count = 0;
			delete_post_meta( $post_id, $count_key );
			add_post_meta( $post_id, $count_key, '0' );
	} else {
			$count++;
			update_post_meta( $post_id, $count_key, $count );
	}
}
function is_bot() {
	// クローラーのアクセス判別.
	$ua = $_SERVER['HTTP_USER_AGENT'];

	$bot = array(
		'googlebot',
		'msnbot',
		'yahoo',
	);
	foreach ( $bot as $bot ) {
		if ( stripos( $ua, $bot ) !== false ) {
			return true;
		}
	}
	return false;
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
