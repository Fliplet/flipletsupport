<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */

get_header();
?>

<article class="container-lg">

  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();
      the_content();
    endwhile;
  endif;
  ?>

</article>

<?php get_footer();?>