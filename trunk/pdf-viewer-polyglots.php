<?php

/*
 * Plugin Name:       PDF Viewer Ployglots
 * Plugin URI:        https://github.com/mehrazmorshed/pdf-viewer-polyglots/tree/main/trunk
 * Description:       Read PDF in multiple language.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Tested up to:      6.3
 * Author:            Mehraz Morshed
 * Author URI:        https://profiles.wordpress.org/mehrazmorshed/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdf-viewer
 * Domain Path:       /languages
 */

/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function pdf_viewer_load_textdomain() {
    load_plugin_textdomain( 'pdf-viewer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'init', 'pdf_viewer_load_textdomain' );

function pdf_viewer_option_page() {

    add_menu_page( 'PDF Viewer Option', 'PDF Viewer', 'manage_options', 'pdf-viewer', 'pdf_viewer_create_page', 'dashicons-admin-plugins', 101 );
}
add_action( 'admin_menu', 'pdf_viewer_option_page' );

function pdf_viewer_style_settings() {

    wp_enqueue_style( 'pdf-viewer-settings', plugins_url( 'css/pdf-viewer-settings.css', __FILE__ ), false, "1.0.0" );
}
add_action( 'admin_enqueue_scripts', 'pdf_viewer_style_settings' );

function pdf_viewer_create_page() {
    ?>
    <div class="pdf_viewer_main">
        <div class="pdf_viewer_body pdf_viewer_common">
            <h1 id="page-title"><?php esc_attr_e( 'PDF Viewer Polyglots', 'pdf-viewer' ); ?></h1>
            <form action="options.php" method="post">
                <?php wp_nonce_field( 'update-options' ); ?>

                <!-- PDF Viewer Polyglots -->
                <label for="pdf-viewer-option"><?php esc_attr_e( 'Language Settings', 'pdf-viewer' ); ?></label>

                <label class="radios">
                    <input type="radio" name="pdf-viewer-option" id="pdf-viewer-option-en" value="en" <?php if( get_option( 'pdf-viewer-option' ) == 'en' ) { echo 'checked="checked"'; } ?>>
                    <span><?php _e( 'English (en)', 'pdf-viewer' ); ?></span>
                </label>

                <label class="radios">
                    <input type="radio" name="pdf-viewer-option" id="pdf-viewer-option-ja" value="ja" <?php if( get_option( 'pdf-viewer-option' ) == 'ja' ) { echo 'checked="checked"'; } ?>>
                    <span><?php _e( '日本語 (ja)', 'pdf-viewer' ); ?></span>
                </label>

                <label class="radios">
                    <input type="radio" name="pdf-viewer-option" id="pdf-viewer-option-bn" value="bn" <?php if( get_option( 'pdf-viewer-option' ) == 'bn' ) { echo 'checked="checked"'; } ?>>
                    <span><?php _e( 'বাংলা (bn)', 'pdf-viewer' ); ?></span>
                </label>

                <label class="radios">
                    <input type="radio" name="pdf-viewer-option" id="pdf-viewer-option-hi" value="hi" <?php if( get_option( 'pdf-viewer-option' ) == 'hi' ) { echo 'checked="checked"'; } ?>>
                    <span><?php _e( 'हिन्दी (hi)', 'pdf-viewer' ); ?></span>
                </label>

                <!--  -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="page_options" value="pdf-viewer-option">
                <br>
                <input class="button button-primary" type="submit" name="submit" value="<?php _e( 'Save Changes', 'pdf-viewer' ) ?>">
            </form>
        </div>
        <div class="pdf_viewer_aside pdf_viewer_common">
            <!-- about plugin author -->
            <h2 class="aside-title"><?php esc_attr_e( 'About Plugin Author', 'pdf-viewer' ); ?></h2>
            <div class="author-card">
                <a class="link" href="https://profiles.wordpress.org/mehrazmorshed/" target="_blank">
                    <img class="center" src="<?php print plugin_dir_url( __FILE__ ) . '/img/author.png'; ?>" width="128px">
                    <h3 class="author-title"><?php esc_attr_e( 'Mehraz Morshed', 'pdf-viewer' ); ?></h3>
                    <h4 class="author-title"><?php esc_attr_e( 'WordPress Developer', 'pdf-viewer' ); ?></h4>
                </a>
                <h1 class="author-title">
                    <a class="link" href="https://www.facebook.com/mehrazmorshed" target="_blank"><span class="dashicons dashicons-facebook"></span></a>
                    <a class="link" href="https://twitter.com/mehrazmorshed" target="_blank"><span class="dashicons dashicons-twitter"></span></a>
                    <a class="link" href="https://www.linkedin.com/in/mehrazmorshed" target="_blank"><span class="dashicons dashicons-linkedin"></span></a>
                    <a class="link" href="https://www.youtube.com/@mehrazmorshed" target="_blank"><span class="dashicons dashicons-youtube"></span></a>
                </h1>
            </div>
            <!-- other useful plugins -->
            <h3 class="aside-title"><?php esc_attr_e( 'Other Useful Plugins', 'pdf-viewer' ); ?></h3>
            <div class="author-card">
                <a class="link" href="https://wordpress.org/plugins/turn-off-comments/" target="_blank">
                    <span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Turn Off Comments', 'pdf-viewer' ) ?></b>
                </a>
                <hr>
                <a class="link" href="https://wordpress.org/plugins/hide-admin-navbar/" target="_blank">
                    <span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Hide Admin Navbar', 'pdf-viewer' ) ?></b>
                </a>
                <hr>
                <a class="link" href="https://wordpress.org/plugins/tap-to-top/" target="_blank">
                    <span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Tap To Top', 'pdf-viewer' ) ?></b>
                </a>
                <hr>
                <a class="link" href="https://wordpress.org/plugins/customized-login/" target="_blank">
                    <span class="dashicons dashicons-admin-plugins"></span> <b><?php _e( 'Custom Login Page', 'pdf-viewer' ) ?></b>
                </a>
            </div>
            <!-- donate to this plugin -->
            <h3 class="aside-title"><?php esc_attr_e( 'PDF Viewer Polyglots', 'pdf-viewer' ); ?></h3>
            <a class="link" href="https://www.buymeacoffee.com/mehrazmorshed" target="_blank">
                <button class="button button-primary btn"><?php esc_attr_e( 'Donate To This Plugin', 'pdf-viewer' ); ?></button>
            </a>
        </div>
    </div>
    <?php
}

function display_pdf($atts) {
    $pdf_attachment = get_post($atts);
    if ($pdf_attachment && 'application/pdf' === get_post_mime_type($pdf_attachment)) {
        $pdf_embed = wp_get_attachment_url($pdf_attachment->ID);
        return "<iframe src='$pdf_embed' width='100%' height='600'></iframe>";
    } else {
        return "Invalid PDF ID or PDF not found.";
    }
}

add_shortcode('view-pdf', 'pdf_viewer_polyglots');

function pdf_viewer_polyglots() {

    if( get_option( 'pdf-viewer-option' ) == 'en' ) {
        return display_pdf(33);
    }
    elseif ( get_option( 'pdf-viewer-option' ) == 'ja' ) {
        return display_pdf(31);
    }
    elseif ( get_option( 'pdf-viewer-option' ) == 'bn' ) {
        return display_pdf(30);
    }
    elseif ( get_option( 'pdf-viewer-option' ) == 'hi' ) {
        return display_pdf(32);
    }
}

function pdf_viewer_plugin_activation() {

    add_option( 'pdf_viewer_plugin_do_activation_redirect', true );
}
register_activation_hook( __FILE__, 'pdf_viewer_plugin_activation' );

function pdf_viewer_plugin_redirect() {

    if( get_option( 'pdf_viewer_plugin_do_activation_redirect', false ) ) {

        delete_option( 'pdf_viewer_plugin_do_activation_redirect' );

        if ( !isset( $_GET['active-multi'] ) ) {

            wp_safe_redirect( admin_url( 'admin.php?page=pdf-viewer' ) );
            exit;
        }
    }
}
add_action( 'admin_init', 'pdf_viewer_plugin_redirect' );
