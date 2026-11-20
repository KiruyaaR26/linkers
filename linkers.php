<?php
/*
Plugin Name: linkers
Plugin URI: https://codeberg.org/coderose/linkers
Description: Open source application for standards-based digital asset management and access. 
Version: 0.0.1
Author: Yuros Development Team 
Author URI: https://codeberg.org/coderose/linkers/activity/contributors
License: https://codeberg.org/coderose/linkers/src/branch/main/LICENSE
Text Domain: linkers
*/

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

define( 'linkers_dir', plugin_dir_path( __FILE__ )  );
define( 'linkers_url', plugins_url( __FILE__ ) . 'assets' );


function linkers_activate(){
    require_once plugin_dir_path( __FILE__ ) . 'include/activate.php';
	linkers_activate::action();
}
register_activation_hook( __FILE__, 'linkers_activate' );


function linkers_disabled(){
    require_once plugin_dir_path( __FILE__ ) . 'include/disabled.php';
    linkers_disabled::action();
}
register_deactivation_hook( __FILE__, 'linkers_disabled' );


function linkers_removals(){
    require_once plugin_dir_path( __FILE__ ) . 'include/removal.php';
    linkers_removals::action();
}
register_uninstall_hook( __FILE__, 'linkers_removals' );


function linkers_bootups() {
    require_once plugin_dir_path( __FILE__ ) . 'include/bootups.php';
    new init_linkers;
}
add_action( 'plugins_loaded', 'linkers_bootups' );