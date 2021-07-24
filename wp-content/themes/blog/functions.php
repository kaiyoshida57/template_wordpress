<?php

function my_scripts() {
  // common css/js
  // enqueueの第1引数は、'-style','-script'形式にする 第5引数をtrueにすると終了body前に出力される。
  wp_enqueue_style( 'common-style', get_template_directory_uri() . '/common/css/style.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'setting-script', get_template_directory_uri() . '/common/js/setting.js', array( 'jquery' ), '1.0.0', true );

  // part css/js
  if ( is_singular('news') ) {
    wp_enqueue_script( 'smart-single-script', get_template_directory_uri() . 'common/js/news.js', "", '1.0.0', true );
  }
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


// meta title output
add_theme_support( 'title-tag' );


// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');

?>
