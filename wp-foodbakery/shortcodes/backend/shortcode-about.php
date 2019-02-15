<?php
/**
 * File Type: About Shortcode
 */
if (!class_exists('Foodbakery_Shortcode_About')) {

    class Foodbakery_Shortcode_About {
        
        /**
         * Constant variables
         */
        
        var $PREFIX = 'foodbakery_about';
        
        
        /**
         * Start construct Functions
         */
        
        public function __construct() {
            
            add_filter( 'foodbakery_shortcodes_list', array( $this, 'foodbakery_field_button_option' ), 11, 1 );
            add_action( 'wp_ajax_foodbakery_shortcode_foodbakery_about', array( $this, 'foodbakery_shortcode_foodbakery_about_callback' ) );
        }
        
        /*
         * Add this shortcode option in shortcode button.
         */
        public function foodbakery_field_button_option( $shortcode_array ){
            
            $shortcode_array['foodbakery_about'] = array(
                'title' => esc_html__('FB: About Us', 'foodbakery'),
                'name' => 'foodbakery_about',
                'icon' => 'icon-table',
                'categories' => 'loops misc',
            );
            
            return $shortcode_array;
        }
        
        
        /*
         * Shortcode backend fields.
         */
        public function foodbakery_shortcode_foodbakery_about_callback(){
            global $post, $foodbakery_html_fields, $foodbakery_form_fields;
            $shortcode_element = '';
            $filter_element = 'filterdrag';
            $shortcode_view = '';
            $output = array();
            $counter = $_POST['counter'];
            $foodbakery_counter = $_POST['counter'];
            $album_num = 0;
            if (isset($_POST['action']) && !isset($_POST['shortcode_element_id'])) {
                $POSTID = '';
                $shortcode_element_id = '';
            } else {
                $POSTID = $_POST['POSTID'];
                $shortcode_element_id = $_POST['shortcode_element_id'];
                $shortcode_str = stripslashes($shortcode_element_id);
                $PREFIX = $this->PREFIX;
                $parseObject = new ShortcodeParse();
                $output = $parseObject->foodbakery_shortcodes($output, $shortcode_str, true, $PREFIX);
            }
            $defaults = array('title' => '', 'about_url' => '', 'bg_color' => '', 'text_color' => '', 'image_about_url' => '', 'button_text' => '', 'content', '', 'about_action_textarea' => '');
            if (isset($output['0']['atts'])) {
                $atts = $output['0']['atts'];
            } else {
                $atts = array();
            }
            if (isset($output['0']['content'])) {
                $atts_content = $output['0']['content'];
            } else {
                $atts_content = array();
            }
            if (is_array($atts_content)) {
                $album_num = count($atts_content);
            }
            $about_element_size = '25';
            foreach ($defaults as $key => $values) {
                if (isset($atts[$key])) {
                    $$key = $atts[$key];
                } else {
                    $$key = $values;
                }
            }
            $name = 'foodbakery_pb_about';
            $coloumn_class = 'column_' . $about_element_size;
            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                $shortcode_element = 'shortcode_element_class';
                $shortcode_view = 'cs-pbwp-shortcode';
                $filter_element = 'ajax-drag';
                $coloumn_class = '';
            }
            $content_texarea = isset($atts['content']) ? $atts['content'] : '';
            $foodbakery_image_url = isset($atts['about_url']) ? $atts['about_url'] : '';
            $foodbakery_text_color = isset($atts['text_color']) ? $atts['text_color'] : '';
            $foodbakery_bg_color = isset($atts['bg_color']) ? $atts['bg_color'] : '';
            ?>

            <div id="<?php echo esc_attr($name . $foodbakery_counter) ?>_del" class="column  parentdelete <?php echo esc_attr($coloumn_class); ?> <?php echo esc_attr($shortcode_view); ?>" item="about" data="" >
                <?php //foodbakery_element_setting($name, $foodbakery_counter, $about_element_size, '', 'play-circle'); ?>
                <div class="cs-wrapp-class-<?php echo intval($foodbakery_counter) ?> <?php echo esc_attr($shortcode_element); ?>" id="<?php echo esc_attr($name . $foodbakery_counter) ?>" data-shortcode-template="[<?php echo esc_attr( $this->PREFIX ); ?> {{attributes}}]{{content}}[/<?php echo esc_attr( $this->PREFIX ); ?>]" style="display: none;">
                    <div class="cs-heading-area">
                        <h5><?php esc_html_e('About OPTIONS', 'foodbakery'); ?></h5>
                        <a href="javascript:removeoverlay('<?php echo esc_js($name . $foodbakery_counter) ?>','<?php echo esc_js($filter_element); ?>')" class="cs-btnclose"><i class="icon-times"></i></a> </div>
                    <div class="cs-pbwp-content">
                        <div class="cs-wrapp-clone cs-shortcode-wrapp">
                            <?php
                            if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') {
                                //foodbakery_shortcode_element_size();
                            }
                            ?>
                            <?php
                            $foodbakery_opt_array = array(
                                'name' => esc_html__('Element Title', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => esc_html__("Enter element title here.", "foodbakery"),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => '',
                                    'id' => 'title',
                                    'cust_name' => 'title[]',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);
                            $foodbakery_opt_array = array(
                                'name' => esc_html__('Button Url', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_url($about_url),
                                    'id' => 'about_url[]',
                                    'cust_name' => 'about_url[]',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);

                            $foodbakery_opt_array = array(
                                'name' => esc_html__('Button Text', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_html($button_text),
                                    'id' => 'button_text',
                                    'cust_name' => 'button_text[]',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);

                            $foodbakery_opt_array = array(
                                'name' => esc_html__('Color', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => esc_html__("Set the button Text color.", 'foodbakery'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($foodbakery_text_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'text_color[]',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);

                            $foodbakery_opt_array = array(
                                'name' => esc_html__('BG Color', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => esc_html__("Set the BG color for your about us.", 'foodbakery'),
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_attr($foodbakery_bg_color),
                                    'cust_id' => '',
                                    'classes' => 'bg_color',
                                    'cust_name' => 'bg_color[]',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);




                            $foodbakery_opt_array = array(
                                'name' => esc_html__('Content', 'foodbakery'),
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_html($content_texarea),
                                    'id' => 'content_texarea',
                                    'cust_name' => 'content[]',
                                    'foodbakery_editor' => true,
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_textarea_field($foodbakery_opt_array);

                            if (function_exists('foodbakery_shortcode_custom_classes_test')) {
                                foodbakery_shortcode_custom_dynamic_classes($foodbakery_about_custom_class, $foodbakery_about_custom_animation, '', 'about');
                            }
                            ?>
                        </div>
                        <?php if (isset($_POST['shortcode_element']) && $_POST['shortcode_element'] == 'shortcode') { ?>
                            <ul class="form-elements insert-bg">
                                <li class="to-field"> <a class="insert-btn cs-main-btn" onclick="javascript:Shortcode_tab_insert_editor('<?php echo esc_js(str_replace('foodbakery_pb_', '', $name)); ?>', '<?php echo esc_js($name . $foodbakery_counter) ?>', '<?php echo esc_js($filter_element); ?>')" ><?php esc_html_e('Insert', 'foodbakery'); ?></a> </li>
                            </ul>
                            <div id="results-shortocde"></div>
                        <?php } else { ?>
                            <?php
                            $foodbakery_opt_array = array(
                                'std' => 'about',
                                'id' => '',
                                'before' => '',
                                'after' => '',
                                'classes' => '',
                                'extra_atr' => '',
                                'cust_id' => '',
                                'cust_name' => 'orderby[]',
                                'return' => true,
                                'required' => false
                            );
                            echo foodbakery_special_char($foodbakery_form_fields->foodbakery_form_hidden_render($foodbakery_opt_array));
                            ?>
                            <?php
                            $foodbakery_opt_array = array(
                                'name' => '',
                                'desc' => '',
                                'hint_text' => '',
                                'echo' => true,
                                'field_params' => array(
                                    'std' => esc_html__('Save', 'foodbakery'),
                                    'cust_id' => '',
                                    'cust_type' => 'button',
                                    'classes' => 'cs-admin-btn',
                                    'cust_name' => '',
                                    'extra_atr' => 'onclick="javascript:_removerlay(jQuery(this))"',
                                    'return' => true,
                                ),
                            );

                            $foodbakery_html_fields->foodbakery_text_field($foodbakery_opt_array);
                            ?>               
                        <?php } ?>
                        <script>
                            /* modern selection box function */
                            jQuery(document).ready(function ($) {
                                chosen_selectionbox();
                            });
                            /* modern selection box function */
                        </script>
                    </div>
                </div>
            </div>
            <?php
            wp_die();
        }
    }
    global $foodbakery_shortcode_about;
    $foodbakery_shortcode_about    = new Foodbakery_Shortcode_About();
}
