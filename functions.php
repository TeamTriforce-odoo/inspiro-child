<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'inspiro-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

/************************************************
 * 独自CSSファイルの読み込み処理
 *
 * 主に CSS を SASS で 書きたい人用です。 素の CSS を直接書くなら style.css に記載してかまいません.
 */

// 独自のCSSファイル（assets/css/）を読み込む場合は true に変更してください.
$my_inspiro_additional_css = false;

if ($my_inspiro_additional_css) {
    // 公開画面側のCSSの読み込み.
    add_action(
        'wp_enqueue_scripts',
        function () {
            wp_enqueue_style(
                'my-lightning-custom',
                get_stylesheet_directory_uri() . '/assets/css/style.css',
                array('lightning-design-style'),
                filemtime(dirname(__FILE__) . '/assets/css/style.css')
            );
        }
    );
    // 編集画面側のCSSの読み込み.
    add_action(
        'enqueue_block_editor_assets',
        function () {
            wp_enqueue_style(
                'my-lightning-editor-custom',
                get_stylesheet_directory_uri() . '/assets/css/editor.css',
                array('wp-edit-blocks', 'lightning-gutenberg-editor'),
                filemtime(dirname(__FILE__) . '/assets/css/editor.css')
            );
        }
    );
}

// END ENQUEUE PARENT ACTION
