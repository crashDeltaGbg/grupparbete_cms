<?php
get_header(); ?>



<div class="career">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
  <?php
  // query_posts(array('category_name' => 'positions', 'posts_per_page' => -1));
  $query = new WP_Query('cat=-!1');

  if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <div>
        <h2><?php the_field('position_title'); ?></h2>
        <div>
          <?php the_field('position_details'); ?>
        </div>
      </div>
  <?php endwhile;
  endif; ?>

</div>

<?php
get_footer(); ?>