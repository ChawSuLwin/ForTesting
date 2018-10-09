<?php
// get view count of post by id
function wpb_get_post_views($postID)
{
  $count_key = 'popular_post_views_count';
  $count     = get_post_meta($postID, $count_key, true);
  if ($count == '') :
    delete_post_meta($postID, $count_key, true);
    add_post_meta($postID, $count_key, '0', true);
    return "0 view";
  elseif ($count == '1') :
    return "1 view";
  endif;
  return $count . ' views';
}

// set view count of post by id
function wpb_set_post_views($postID)
{
  $count_key = 'popular_post_views_count';
  $count     = get_post_meta($postID, $count_key, true);
  if ($count == '') :
    $count = 0;
    delete_post_meta($postID, $count_key, true);
    add_post_meta($postID, $count_key, '1', true);
  else :
    $count++;
    update_post_meta($postID, $count_key, $count);
  endif;
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Popular Posts Block (Display popular posts)
function popularPosts()
{
  $popularpost = new WP_Query(
    array(
      'posts_per_page'      => 4,
      'post_status'         => 'publish',
      'post_type'           => 'post',
      'meta_key'            => 'popular_post_views_count',
      'orderby'             => 'meta_value_num',
      'order'               => 'DESC',
      'ignore_sticky_posts' => true,
    )
  );

  if ($popularpost->have_posts()) :
    echo '<aside class="widget_posts">';
    echo the_custom_popularPost_header();
    echo '<ul>';
    while ($popularpost->have_posts()) : $popularpost->the_post();
      echo '<li>';
      echo '<div class="entry_thumbnail">';
      echo '<a href="';
      the_permalink();
      echo '">';
     the_post_thumbnail();
      echo '</div>';
      echo '</a>';
      echo '<div class="pop-title">';
      echo '<div class="title">';
      echo mb_strimwidth(get_the_title(), 0, 65, '...');
      echo '</div>';
      echo '</div>';
      echo '<div class="pop-content">';
      dynamic_excerpt();
      echo '</div>';
      echo '<span class="view-counts">' . wpb_get_post_views(get_the_id()) . '</span>';
      echo '</li>';
    endwhile;
    echo '</ul>';
    echo "</aside>";
  endif;
}
