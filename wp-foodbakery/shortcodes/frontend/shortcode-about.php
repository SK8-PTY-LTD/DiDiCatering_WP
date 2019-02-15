<?php
/**
 * File Type: About Shortcode Frontend
 */
if (!class_exists('Foodbakery_Shortcode_About_Frontend')) {

    class Foodbakery_Shortcode_About_Frontend {
        
        /**
         * Constant variables
         */
        
        var $PREFIX = 'foodbakery_about';
        
        
        /**
         * Start construct Functions
         */
        
        public function __construct() {
            add_shortcode( $this->PREFIX, array($this, 'foodbakery_about_shortcode_callback' ) );
        }
        
        /*
         * Shortcode View on Frontend
         */
        public function foodbakery_about_shortcode_callback( $atts, $content = "" ) {
            
            echo esc_html($atts['title']);
        }
    }
    
    global $foodbakery_shortcode_about_frontend;
    $foodbakery_shortcode_about_frontend    = new Foodbakery_Shortcode_About_Frontend();
}
