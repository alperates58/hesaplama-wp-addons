<?php
/**
 * Plugin Name: Hesaplama Suite
 * Plugin URI:  https://github.com/YOUR_USERNAME/hesaplama-wp-addons
 * Description: Modüler hesap makineleri koleksiyonu. GitHub üzerinden güncellenir.
 * Version:     1.0.17
 * Author:      Alper ATEŞ
 * Text Domain: hesaplama-suite
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$hc_last_update_sha     = substr( (string) get_option( 'hc_last_update_sha', '' ), 0, 7 );
$hc_last_update_version = (string) get_option( 'hc_last_update_version', '0' );

define( 'HC_VERSION',    '1.0.17-' . $hc_last_update_version . ( $hc_last_update_sha ? '-' . $hc_last_update_sha : '' ) );
define( 'HC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'HC_PLUGIN_FILE', __FILE__ );

require_once HC_PLUGIN_DIR . 'includes/class-github-updater.php';
require_once HC_PLUGIN_DIR . 'includes/class-calculator-loader.php';
require_once HC_PLUGIN_DIR . 'includes/class-ai-provider.php';
require_once HC_PLUGIN_DIR . 'admin/class-admin-page.php';
require_once HC_PLUGIN_DIR . 'admin/class-ai-writer.php';
require_once HC_PLUGIN_DIR . 'admin/class-ai-module-generator.php';
require_once HC_PLUGIN_DIR . 'admin/class-ai-bulk-generator.php';
require_once HC_PLUGIN_DIR . 'admin/class-post-metabox.php';

new HC_Github_Updater();
new HC_Calculator_Loader();
new HC_Admin_Page();
new HC_AI_Writer();
new HC_AI_Module_Generator();
new HC_AI_Bulk_Generator();
new HC_Post_Metabox();
