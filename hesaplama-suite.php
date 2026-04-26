<?php
/**
 * Plugin Name: Hesaplama Suite
 * Plugin URI:  https://github.com/YOUR_USERNAME/hesaplama-wp-addons
 * Description: Modüler hesap makineleri koleksiyonu. GitHub üzerinden güncellenir.
 * Version:     1.0.0
 * Author:      hesaplamaa.com
 * Text Domain: hesaplama-suite
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'HC_VERSION',    '1.0.9' );
define( 'HC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'HC_PLUGIN_FILE', __FILE__ );

require_once HC_PLUGIN_DIR . 'includes/class-github-updater.php';
require_once HC_PLUGIN_DIR . 'includes/class-calculator-loader.php';
require_once HC_PLUGIN_DIR . 'includes/class-ai-provider.php';
require_once HC_PLUGIN_DIR . 'admin/class-admin-page.php';
require_once HC_PLUGIN_DIR . 'admin/class-ai-writer.php';
require_once HC_PLUGIN_DIR . 'admin/class-post-metabox.php';

new HC_Github_Updater();
new HC_Calculator_Loader();
new HC_Admin_Page();
new HC_AI_Writer();
new HC_Post_Metabox();
