<?php
/**
 * Template part for displaying posts' categories
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */

?>

<?php
$queriedObject = get_queried_object();
$currentCategoryId = $queriedObject->term_id;
$postCategoryArray = get_the_category(false);
$foundCategory = current(array_filter($postCategoryArray, function($e) use($currentCategoryId) { return $e->term_id == 4; }));
$isCurrentCategory = $foundCategory;
?>

<ul class="category-list">
  <li class="cat-item <?php echo is_category() ? '' : 'current-cat' ?>">
    <a aria-current="page" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">All</a>
  </li>
  <?php wp_list_categories(array(
    'hide_empty' => 0,
    'current_category' => $isCurrentCategory,
    'title_li' => ''
  )); ?> 
</ul>