<?php
/**
 * Template part for displaying the search form with a category query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */

$queriedObject = get_queried_object();
$categoryId = $queriedObject->term_id;
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_home_url(); ?>">
  <div class="search-input-group">
    <input class="form-control" type="text" value="" name="s" id="s" placeholder="Search...">
    <input type="hidden" value="<?php echo $categoryId ?>" name="cat">
    <button type="submit" id="searchsubmit" value="Search">
      <i class="fl-icon-search"></i>
    </button>
  </div>
</form>