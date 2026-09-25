<?php
/**
 * Template part for displaying the top menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */
?>
<div id="navbar-mobile" class="collapse">
  <div class="navbar-overlay-title">Search</div>
  <?php
  get_template_part( 'template-parts/search/search', 'form' );
  ?>
  <div class="navbar-overlay-title">Main menu</div>
  <?php
  wp_nav_menu(
    array(
      'theme_location' => 'top-menu',
      'menu_class' => 'navbar-nav',
      'walker' => new Nav_Menu_Walker_Bootstrap(),
    )
  );
  ?>
</div>
