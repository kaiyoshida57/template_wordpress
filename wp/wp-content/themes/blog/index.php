<?php
/*
通常の投稿一覧
posts archive
 */
?>

<?php get_header(); ?>

<div class="wrapper">

  <main class="content" role="main">

    <h1><span>NEWS</span></h1>
    <section>

    <?php
    if( have_posts() ) :
      while ( have_posts() ) :
        the_post();
    ?>

    <a href="<?php echo get_permalink(); ?>">
      <h2><?php echo the_title(); ?></h2>
    </a>

    <?php endwhile; ?>
    <?php else: ?>
      投稿がありません。
    <?php endif; ?>

    </section>
  </main>

</div>
<?php get_footer(); ?>
