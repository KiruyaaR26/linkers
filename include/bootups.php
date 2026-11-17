<?php
/**
 * Auxiliary Data Gatherer & Model Generator
 *
 * Aggregates runtime data and schemas from active plugins, themes, and the
 * Rozard framework to dynamically instantiate WordPress data variants
 * (e.g., post formats, taxonomy terms, metaboxes, and form structures).
 *
 * @package     linkers
 * @subpackage  Include
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


if ( !  class_exists( 'init_linkers' ) ) {
   
    class init_linkers {

        public function __construct() {

            if ( ! defined( 'linkers_dir' ) ) {
                return;
            }

            $this->atomics();
            $this->assetor();
            $this->extends();
            $this->backers();
            $this->blocker();
            $this->content();
            $this->context();
            $this->formers();
            $this->members();
            $this->settings();
        }


        private function assetor() {

            $path = linkers_dir . '/assetor/loader.php';

            if ( file_exists( $path ) ) {
                require_once $path;
            }
        }


        private function atomics() {

            $path = linkers_dir . '/atomics/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function backers() {

            $path = linkers_dir . '/backers/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function blocker() {

            $path = linkers_dir . '/blocker/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function content() {

            $path = linkers_dir . '/content/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function context() {

            $path = linkers_dir . '/context/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function formers() {

            $path = linkers_dir . '/formers/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function members() {

            $path = linkers_dir . '/members/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function settings() {

            $path = linkers_dir . '/settings/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }


        private function extends() {

            $path = linkers_dir . '/extends/loader.php';

            if ( file_exists(  $path ) ) {
                require_once $path;
            }
        }
    }
}
