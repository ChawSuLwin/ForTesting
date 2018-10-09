<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scm_test
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
<div class="entry-content">

  <header class="entry-header">
    <h2 class="entry-title">
    <a href="<?php the_permalink();?>" rel="bookmark" target="self">

        <?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?>
      </a>
    </h2>
  </header><!-- .entry-header -->
  </a>
</div>
  <div class="entry-thumbnail">
  <div class='entry-image image-large'>
      <a href="<?php the_permalink();?>">
    <?php
      if (has_post_thumbnail()):
        the_post_thumbnail();
      else :
        the_dummy_thumbnail();
      endif;
    ?>
  </a>
  </div>
  </div>

  <div class="entry-summary">
    <?php dynamic_excerpt(); ?>
  </div><!-- .entry-summary -->

</article><!-- #post-## -->
