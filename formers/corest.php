<?php
/**
 * Digital Asset Custom Meta Box Configuration
 *
 * This file handles the registration, rendering, and saving operations for custom 
 * meta boxes associated with the 'digital_asset' custom post type. It provides 
 * a comprehensive administrative UI to input and manage extensive metadata, 
 * including media specifications, geographic data, attribution, and licensing details.
 *
 * @package     linkers
 * @subpackage  Context
 * @link        renders.php
 * @version     1.0.0
 * @author      Achmad Baihaqi
 * @author      Muhammad Ridho Nur Islam
 * @copyright   2026 Achmad Baihaqi, Muhammad Ridho Nur Islam. All rights reserved.
 * @license     MIT
 *
 * NOTICE OF LICENSE:
 * Distribution, modification, or redistribution of this source code, in whole 
 * or in part, is strictly prohibited without prior written authorization from 
 * the copyright holder.
 */

declare(strict_types=1);


// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}


/**
 * Registers the custom meta box for the digital asset post type.
 *
 * Adds the 'Details' meta box to the WordPress admin editing screen for 
 * 'digital_asset' post types, linking it to the rendering callback function.
 *
 * @since  1.0.0
 * @author Achmad Baihaqi
 * @return void
 */

