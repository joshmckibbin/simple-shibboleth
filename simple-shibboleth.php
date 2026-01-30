<?php
/**
 * Plugin Name: Simple Shibboleth
 * Description: User authentication via Shibboleth Single Sign-On.
 * Version: 1.5.4
 * Requires at least: 6.0
 * Requires PHP: 8.2
 * Author: Steve Guglielmo, Josh Mckibbin
 * License: MIT
 * Network: true
 * Text Domain: simple-shibboleth
 *
 * See the LICENSE file for more information.
 *
 * @package SimpleShibboleth
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define the plugin version.
define( 'SIMPLE_SHIBBOLETH_VERSION', '1.5.4' );

require_once 'class-simple-shib.php';

// Register activation hook.
register_activation_hook( __FILE__, array( 'Simple_Shib', 'activate' ) );

// Register deactivation hook.
register_deactivation_hook( __FILE__, array( 'Simple_Shib', 'deactivate' ) );

// Register uninstall hook.
register_uninstall_hook( __FILE__, array( 'Simple_Shib', 'uninstall' ) );

// Initialize the plugin.
Simple_Shib::get_instance()->init();
