<?php
get_header(); ?>



<div class="career">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
  <?php
  // query_posts(array('category_name' => 'positions', 'posts_per_page' => -1));
  $query = new WP_Query('cat=-!1');

  if ($query->have_posts()) : ?>

    <h2>Open Positions</h2>

    <?php

  endif;

  if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <div class="position">
        <h2 class="position_title"><?php the_field('position_title'); ?></h2>
        <?php the_field('position_details'); ?>
        <img class="position_img" src="<?php the_field('position_img'); ?>" alt="<?php the_field('position_title'); ?>" />
      </div>
  <?php endwhile;
  endif; ?>

</div>

<?php
get_footer(); ?>