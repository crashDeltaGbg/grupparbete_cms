<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );



function allow_onclick_content() {
  global $allowedposttags, $allowedtags;
  $newattribute = "onclick";

  $allowedposttags["a"][$newattribute] = true;
  $allowedtags["a"][$newattribute] = true; //unnecessary?
}
add_action( 'init', 'allow_onclick_content' );



register_sidebar( array(
   'name'          => 'Footer Widget',
   'id'            => 'footer-widget',
   'before_widget' => '<div class="footer-widget">',
   'after_widget'  => '</div>'
) );

