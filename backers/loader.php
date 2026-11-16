<?php
/**
 * Auxiliary Data Gatherer & Model Generator
 *
 * Aggregates runtime data and schemas from active plugins, themes, and the
 * Rozard framework to dynamically instantiate WordPress data variants
 * (e.g., post formats, taxonomy terms, metaboxes, and form structures).
 *
 * @package     linkers
 * @subpackage  Backers
 * @link        renders.php
 * @version     1.0.0
 * @author      Al Muhdil Karim 
 * @copyright   2026 Al Muhdil Karim. All rights reserved.
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