<?php
/**
 * scm_test Theme Color Customizer.
 *
 * @package scm_test
 */
/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since SCM Test 1.0
 *
 * @see scm_test_style()
 *
 * @uses scm_test_style()
 * @uses scm_test_admin_header_style()
 * @uses scm_test_admin_header_image()
 */
$bg_image_path = get_template_directory_uri() . '/src/images/background.gif';
function themename_custom_header_and_background()
{
  $default_body_background_color = "ffffff";
  $default_text_color            = "000000";

  /**
   * Filter the arguments used when adding 'custom-background' support in SCM Test.
   *
   * @since SCM Test 1.0
   *
   * @param array $args {
   *     An array of custom-background support arguments.
   *
   *     @type string $default-color Default color of the background.
   * }
   */
  add_theme_support('custom-background', apply_filters('themename_custom_background_args', array(
    'default-color'          => $default_body_background_color,
    'default-image'          => $GLOBALS['bg_image_path'],
    'wp-head-callback'       => 'scm_test_style',
    'admin-preview-callback' => 'scm_test_admin_background_image',
  )));

  /**
   * Filter the arguments used when adding 'custom-header' support in SCM Test.
   *
   * @since SCM Test 1.0
   *
   * @param array $args {
   *     An array of custom-header support arguments.
   *
   *     @type string $default-text-color Default color of the header text.
   *     @type int      $width            Width in pixels of the custom header image. Default 1200.
   *     @type int      $height           Height in pixels of the custom header image. Default 280.
   *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
   *     @type callable $wp-head-callback Callback function used to style the header image and text
   *                                      displayed on the blog.
   * }
   */
  add_theme_support('custom-header', apply_filters('themename_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => $default_text_color,
    'flex-height'            => true,
    'flex-width'             => true,
    'uploads'                => true,
    'wp-head-callback'       => 'scm_test_style',
    'admin-head-callback'    => 'scm_test_admin_header_style',
    'admin-preview-callback' => 'scm_test_admin_header_image',
  )));
}
add_action('after_setup_theme', 'themename_custom_header_and_background');

function theme_customize_register($wp_customize)
{
  $wp_customize->remove_section('header_image');
}
add_action('customize_register', 'theme_customize_register', 50);

/**
 * Adds color supports for the Customizer.
 *
 * @since SCM Test 1.0
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function header_footer_color_customizer($wp_customize)
{
  $default_header_bgcolor       = "#ffffff";
  $default_footer_bgcolor       = "#ffffff";
  $default_copyright_txtcolor   = "#000000";
  $default_txtcolor             = "#000000";
  $default_link_txtcolor        = "royalblue";
  $default_link_hover_txtcolor  = "midnightblue";
  $default_menu_bgcolor         = "#ffffff";
  $default_menu_hover_bgcolor   = "#ffffff";
  $default_menu_txtcolor        = "#000000";
  $default_menu_hover_txtcolor  = "#000000";
  $default_menu_current_bgcolor = "#000000";
  // Header background color customizer
  $wp_customize->add_setting('themename_header_bgcolor', array(
    'default'          => $default_header_bgcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_header_bgcolor', array(
    'label'    => 'ヘッダ背景色',
    'section'  => 'colors',
    'settings' => 'themename_header_bgcolor',
  )));
  // Footer background color customizer
  $wp_customize->add_setting('themename_footer_bgcolor', array(
    'default'          => $default_footer_bgcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_footer_bgcolor', array(
    'label'    => 'フッター背景色',
    'section'  => 'colors',
    'settings' => 'themename_footer_bgcolor',
  )));
  // Footer copyright text color customizer
  $wp_customize->add_setting('themename_copyright_txtcolor', array(
    'default'          => $default_copyright_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_copyright_txtcolor', array(
    'label'    => 'コピーライトテキスト色',
    'section'  => 'colors',
    'settings' => 'themename_copyright_txtcolor',
  )));
  // Text color customizer
  $wp_customize->add_setting('themename_txtcolor', array(
    'default'          => $default_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_txtcolor', array(
    'label'    => 'テキスト色',
    'section'  => 'colors',
    'settings' => 'themename_txtcolor',
  )));
  // Link text color customizer
  $wp_customize->add_setting('themename_link_txtcolor', array(
    'default'          => $default_link_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_link_txtcolor', array(
    'label'    => 'リンクテキスト色',
    'section'  => 'colors',
    'settings' => 'themename_link_txtcolor',
  )));
  // Link text hover color customizer
  $wp_customize->add_setting('themename_link_hover_txtcolor', array(
    'default'          => $default_link_hover_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_link_hover_txtcolor', array(
    'label'    => 'リンクテキストホバー色',
    'section'  => 'colors',
    'settings' => 'themename_link_hover_txtcolor',
  )));
  // Menu background color customizer
  $wp_customize->add_setting('themename_menu_bgcolor', array(
    'default'          => $default_menu_bgcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_bgcolor', array(
    'label'    => 'ナビメニュー背景色',
    'section'  => 'colors',
    'settings' => 'themename_menu_bgcolor',
  )));
  // Menu background hover color customizer
  $wp_customize->add_setting('themename_menu_hover_bgcolor', array(
    'default'          => $default_menu_hover_bgcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_hover_bgcolor', array(
    'label'    => 'ナビメニューホバー背景色',
    'section'  => 'colors',
    'settings' => 'themename_menu_hover_bgcolor',
  )));
  // Menu text color customizer
  $wp_customize->add_setting('themename_menu_txtcolor', array(
    'default'          => $default_menu_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_txtcolor', array(
    'label'    => 'ナビメニューテキスト色',
    'section'  => 'colors',
    'settings' => 'themename_menu_txtcolor',
  )));
  // Menu text hover color customizer
  $wp_customize->add_setting('themename_menu_hover_txtcolor', array(
    'default'          => $default_menu_hover_txtcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_hover_txtcolor', array(
    'label'    => 'ナビメニューホバーテキスト色',
    'section'  => 'colors',
    'settings' => 'themename_menu_hover_txtcolor',
  )));
  // Menu current background color customizer
  $wp_customize->add_setting('themename_menu_current_bgcolor', array(
    'default'          => $default_menu_current_bgcolor,
    'wp-head-callback' => 'scm_test_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'themename_menu_current_bgcolor', array(
    'label'    => 'ナビメニューアクティブ色',
    'section'  => 'colors',
    'settings' => 'themename_menu_current_bgcolor',
  )));
}
add_action('customize_register', 'header_footer_color_customizer');

/**
 * Add postMessage support for site title and description for the Theme color Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme color Customizer object.
 */
function themename_customize_color_register($wp_customize)
{
  $wp_customize->get_setting('themename_header_bgcolor')->transport       = 'postMessage';
  $wp_customize->get_setting('themename_footer_bgcolor')->transport       = 'postMessage';
  $wp_customize->get_setting('themename_copyright_txtcolor')->transport   = 'postMessage';
  $wp_customize->get_setting('themename_txtcolor')->transport             = 'postMessage';
  $wp_customize->get_setting('themename_link_txtcolor')->transport        = 'postMessage';
  $wp_customize->get_setting('themename_link_hover_txtcolor')->transport  = 'postMessage';
  $wp_customize->get_setting('themename_menu_bgcolor')->transport         = 'postMessage';
  $wp_customize->get_setting('themename_menu_hover_bgcolor')->transport   = 'postMessage';
  $wp_customize->get_setting('themename_menu_txtcolor')->transport        = 'postMessage';
  $wp_customize->get_setting('themename_menu_hover_txtcolor')->transport  = 'postMessage';
  $wp_customize->get_setting('themename_menu_current_bgcolor')->transport = 'postMessage';
}
add_action('customize_register', 'themename_customize_color_register');
