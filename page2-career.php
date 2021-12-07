<?php

function open_positions_func()
{
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
  endif;
}
add_shortcode('open_positions', 'open_positions_func');
?>