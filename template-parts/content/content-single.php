<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */

?>

<?php if (has_post_thumbnail()) : ?>
<div class="post-hero" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')">
  <div class="hero-screen"></div>
  <div class="hero-content <?php echo is_full_width_template() ? 'container-fluid' : 'container'; ?>">
    <span class="post-categories post-detail"><?php the_category();?></span>
    <h1><?php the_title(); ?></h1>
    <?php if (has_excerpt()) : ?>
    <p class="title-subtitle"><?php echo get_the_excerpt(); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( is_full_width_template() ? 'container-fluid' : 'container' ); ?>>

<?php if (!has_post_thumbnail()) : ?>
<span class="post-categories post-detail"><?php the_category();?></span>
<h1><?php the_title(); ?></h1>
<?php if (has_excerpt()) : ?>
<p class="title-subtitle"><?php echo get_the_excerpt(); ?></p>
<?php endif; ?>
<?php endif; ?>

<div class="post-content">
<?php the_content(); ?>
</div>

<footer class="entry-footer">
  <?php
  $category = get_the_category(); 
  $category_parent_id = $category[0]->category_parent;

  if ($category_parent_id != get_help_library_category_id()) {
    flipletsupport_entry_footer();
  } else {
    flipletsupport_entry_footer_help();
  }
  ?>
</footer>

</article>