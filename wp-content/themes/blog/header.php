<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <nav>
      <ul class="nav_list">
      <li class="nav_item nav_item-first">
          <a href="<?php echo esc_url(home_url()); ?>" aria-label="blog's logo">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/logo_main.svg" alt="サイトロゴ" width="184" height="">
          </a>
        </li>
        <li class="nav_item">
          <a href="<?php echo esc_url(home_url()); ?>" aria-label="blog logo">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/common/images/logo_main.svg" alt="BLOG" width="184" height="">
          </a>
        </li>
        <li class="nav_item">
          <a href="<?php echo esc_url(home_url()); ?>/about/">ABOUT</a>
        </li>
        <li class="nav_item">
          <a href="<?php echo esc_url(home_url()); ?>/profile/">PROFILE</a>
        </li>
        <li class="nav_item">
          <a href="<?php echo esc_url(home_url()); ?>/news/">NEWS</a>
        </li>
      </ul>
    </nav>
    <!-- /.nav -->
  </header>
