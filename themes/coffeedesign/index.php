<?php get_header(); ?>

<main class="nest">


  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>   
      <h1><?php wp_title(''); ?></h1>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
  
</main>

<?php get_footer(); ?>