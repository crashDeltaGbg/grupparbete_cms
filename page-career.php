<?php
get_header(); ?>

<?php
// query_posts(array('category_name' => 'positions', 'posts_per_page' => -1));
$query = new WP_Query('cat=-!1');

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
    <div>
      <h2><?php the_title(); ?></h2>
      <div><?php the_content(); ?></div>
    </div>
<?php endwhile;
endif; ?>

<?php
get_footer(); ?>