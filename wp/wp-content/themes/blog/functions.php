<?php
define("DIR", get_template_directory_uri());

function my_scripts() {
  // common css/js
  // enqueueの第1引数は、'-style','-script'形式にする 第5引数をtrueにすると終了body前に出力される。
  wp_enqueue_style( 'common-style', DIR. '/common/css/style.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'setting-script', DIR. '/common/js/setting.js', array( 'jquery' ), '1.0.0', true );

  // part css/js
  if ( is_singular('news') ) {
    wp_enqueue_script( 'smart-single-script', DIR. 'common/js/news.js', "", '1.0.0', true );
  }
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


// meta title output
add_theme_support( 'title-tag' );


// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');

// WP絵文字JSを読み込ませない
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// body_class()に、そのページのslugを付与させる
// function add_page_slug_class_name( $classes ) {
//   if ( is_page() ) {
//     $page = get_post( get_the_ID() );
//     $classes[] = $page->post_name;
//   }
//   return $classes;
// }
// add_filter( 'body_class', 'add_page_slug_class_name' );

function remove_menus() {
  // remove_menu_page( 'index.php' ); // ダッシュボード.
  // remove_menu_page( 'edit.php' ); // 投稿.
  // remove_menu_page( 'upload.php' ); // メディア.
  // remove_menu_page( 'edit.php?post_type=page' ); // 固定.
  remove_menu_page( 'edit-comments.php' ); // コメント.
  // remove_menu_page( 'themes.php' ); // 外観.
  // remove_menu_page( 'plugins.php' ); // プラグイン.
  // remove_menu_page( 'users.php' ); // ユーザー.
  // remove_menu_page( 'tools.php' ); // ツール.
  // remove_menu_page( 'options-general.php' ); // 設定.
}
add_action( 'admin_menu', 'remove_menus', 999 );

/* 管理画面にもファビコンを設定 */
// function ad_favicon_dashboard() {
//   echo '<link rel="shortcut icon" rel="icon" href="' . DIR . '/assets/images/common/favicon.ico">';
// }
// add_action('admin_head', 'ad_favicon_dashboard');

// 投稿アーカイブページの有効化
// function post_has_archive( $args, $post_type ) {
// 	if ( 'post' == $post_type ) {
// 		$args['rewrite'] = true;
// 		$args['has_archive'] = 'news'; //任意のスラッグ名
// 	}
// 	return $args;
// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );



?>
