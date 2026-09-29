<?php
/**
 * Plugin Name: Simple Shibboleth
 * Description: User authentication via Shibboleth Single Sign-On.
 * Version: 1.5.5
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

// Use the Plugin Update Checker library for automatic updates.
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Define the plugin version.
define( 'SIMPLE_SHIBBOLETH_VERSION', '1.5.5' );

require_once 'vendor/autoload.php';
require_once 'class-simple-shib.php';

// Initialize the plugin update checker.
$sshib_update_checker = PucFactory::buildUpdateChecker(
	'https://github.com/your-repo/simple-shibboleth/',
	__FILE__,
	'simple-shibboleth'
);

/**
 * Install updates from the built release zip (which includes vendor/), never the source archive.
 * The regex is passed to preg_match() as-is, so it needs delimiters.
 *
 * @var \YahnisElsts\PluginUpdateChecker\v5p7\Vcs\GitHubApi $sshib_vcs_api
 */
$sshib_vcs_api = $sshib_update_checker->getVcsApi();
$sshib_vcs_api->enableReleaseAssets( '/^simple-shibboleth\.zip$/', $sshib_vcs_api::REQUIRE_RELEASE_ASSETS );

// Register activation hook.
register_activation_hook( __FILE__, array( 'Simple_Shib', 'activate' ) );

// Register deactivation hook.
register_deactivation_hook( __FILE__, array( 'Simple_Shib', 'deactivate' ) );

// Register uninstall hook.
register_uninstall_hook( __FILE__, array( 'Simple_Shib', 'uninstall' ) );

// Initialize the plugin.
Simple_Shib::get_instance()->init();
