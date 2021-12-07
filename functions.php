<?php

/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
function generatepress_child_enqueue_scripts()
{
  if (is_rtl()) {
    wp_enqueue_style('generatepress-rtl', trailingslashit(get_template_directory_uri()) . 'rtl.css');
  }
}
add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100);



function allow_onclick_content()
{
  global $allowedposttags, $allowedtags;
  $newattribute = "onclick";

  $allowedposttags["a"][$newattribute] = true;
  $allowedtags["a"][$newattribute] = true; //unnecessary?
}
add_action('init', 'allow_onclick_content');



register_sidebar(array(
  'name'          => 'Footer Widget',
  'id'            => 'footer-widget',
  'before_widget' => '<div class="footer-widget">',
  'after_widget'  => '</div>'
));

function open_positions_func()
{
  ob_start();
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
  return ob_get_clean();
}

add_shortcode('open_positions', 'open_positions_func');
?>