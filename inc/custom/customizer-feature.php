<?php
function theme_feaure_page_customizer($wp_customize)
{
  $wp_customize->add_section('themename_feature_page_scheme', array(
    'title' => 'おすすめページ',
  ));
  $wp_customize->add_setting('Featurepage_header', array(
    'default' => '',
  ));
  $wp_customize->add_control('Featurepage_header', array(
    'label'   => 'おすすめページタイトル',
    'section' => 'themename_feature_page_scheme',
    'type'    => 'text',
  ));
  foreach (range(1, 2) as $themename_fbxp) :
    //  Featured Contents
    $wp_customize->add_setting('themename[fbxpage' . $themename_fbxp . ']', array(
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_html',
      'type'              => 'option',
    ));

    $wp_customize->add_control('themename_fbxpage' . $themename_fbxp, array(
      'label'    => __('おすすめページ', 'scm-template') . ' ' . $themename_fbxp,
      'section'  => 'themename_feature_page_scheme',
      'type'     => 'dropdown-pages',
      'settings' => 'themename[fbxpage' . $themename_fbxp . ']',
    ));
  endforeach;
}
add_action('customize_register', 'theme_feaure_page_customizer');

// Display feature page
function the_custom_feature_page()
{ ?>
  <div class="recommendpg">
    <h2>
      <?php echo get_theme_mod('Featurepage_header', ''); ?>
    </h2>
    <?php
    $themename_fp = array();
    foreach (range(1, 2) as $themename_fbxp) :
      if (esc_html(themename_get_option('fbxpage' . $themename_fbxp, '')) != '') :
        array_push($themename_fp, esc_html(themename_get_option('fbxpage' . $themename_fbxp, '')));
      endif;
    endforeach;
    if ($themename_fp) :
    ?>
      <ul id="page-item">
        <?php
        $themename_fpquery = new WP_Query(
          array('post_type' => 'page',
            'post__in'      => $themename_fp,
          ));
        if (have_posts()) :
          $themename_pcount = 0;
          while ($themename_fpquery->have_posts()) :
            $themename_fpquery->the_post();
            $themename_pcount++;
        ?>
            <li>
              <a href="<?php the_permalink(); ?>" >
                <h3 class="fpage_title">
                  <?php echo mb_strimwidth(get_the_title(), 0, 55, '...'); ?>
                </h3>
                <div class="fpage_img">
                  <?php
                  if (has_post_thumbnail()) :
                    the_post_thumbnail();
                  else :
                    the_dummy_thumbnail();
                  endif;
                  ?>
                </div>
              </a>
              <div class="fpage_content">
                <?php dynamic_excerpt(); ?>
              </div>
            </li>
          <?php
          endwhile;
        endif;
        wp_reset_postdata();?>
      </ul>
    <?php endif; ?>
  </div>
<?php
}
