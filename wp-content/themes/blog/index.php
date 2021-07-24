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
      ?>

            <h3><?php echo the_title(); ?></h3>
            <a href="<?php echo get_permalink(); ?>">

      <?php
          endwhile;
        endif;
      ?>
    </section>
  </main>

</div>
<?php get_footer(); ?>
