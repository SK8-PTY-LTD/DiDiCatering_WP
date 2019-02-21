<?php
/**
 * File Type: Shortcodes Function
 */
if (!class_exists('foodbakery_shortcode_functions')) {

    class foodbakery_shortcode_functions {

	/**
	 * Start construct Functions
	 */
	public function __construct() {

	    /*
	     * Add shortcode button on top of editor.
	     */
	    add_action('media_buttons', array($this, 'foodbakery_shortcode_button'), 11);
	    foodbakery_include_shortcode_files();
	    foodbakery_include_frontend_shortcode_files();
	}

	/*
	 * Function to add shortcode.
	 * To add shortcode use the filter.
	 */

	public function foodbakery_shortcode_names() {

	    $shortcode_array = array();

	    $shortcode_array = apply_filters('foodbakery_shortcodes_list', $shortcode_array);
	    ksort($shortcode_array);
	    return $shortcode_array;
	}

	/*
	 * Function to add Shortcodes Categories.
	 * To add shortcode category use the filter.
	 */

	public function foodbakery_elements_categories() {
	    $categories_array = array(
		'typography' => esc_html__('Typography', 'foodbakery'),
		'commonelements' => esc_html__('Common Elements', 'foodbakery'),
		'mediaelement' => esc_html__('Media Element', 'foodbakery'),
		'contentblocks' => esc_html__('Content Blocks', 'foodbakery'),
		'loops' => esc_html__('Loops', 'foodbakery'));

	    $categories_array = apply_filters('foodbakery_shortcodes_categories_list', $categories_array);

	    return $categories_array;
	}

	/*
	 * Function to add shortcode select options in button.
	 * Do not edit this file unless required
	 */

	public function foodbakery_shortcode_button($die = 0, $shortcode = 'shortcode') {

	    global $foodbakery_form_fields;
	    $i = 1;
	    $rand = rand(1, 999);
	    $foodbakery_page_elements_name = array();
	    $foodbakery_page_elements_name = $this->foodbakery_shortcode_names();
	    $foodbakery_page_categories_name = $this->foodbakery_elements_categories();

	    $foodbakery_insert_btn = true;
	    $screen = get_current_screen();
	    if (is_admin() && isset($screen->parent_file) && $screen->parent_file == 'users.php') {
		$foodbakery_insert_btn = false;
	    }
	    ?> 
	    <div class="cs-page-composer  <?php echo sanitize_html_class($shortcode); ?> composer-<?php echo intval($rand) ?>" id="composer-<?php echo intval($rand) ?>" style="display:none;">
	        <div class="page-elements">
	    	<div class="cs-heading-area">
	    	    <h5>
	    		<i class="icon-plus-circle"></i> <?php esc_html_e('Add Element', 'foodbakery'); ?>
	    	    </h5>
	    	    <span class='cs-btnclose' onclick='javascript:removeoverlay("composer-<?php echo esc_js($rand) ?>", "append")'>
	    		<i class="icon-times"></i>
	    	    </span>
	    	</div>
	    	<script>
	    	    jQuery(document).ready(function ($) {
	    		foodbakery_page_composer_filterable('<?php echo esc_js($rand) ?>');
	    	    });
	    	</script>
	    	<div class="cs-filter-content shortcode">
	    	    <p>
			    <?php
			    $foodbakery_opt_array = array(
				'std' => '',
				'cust_id' => 'quicksearch' . $rand,
				'extra_atr' => ' placeholder="' . esc_html__('Search', 'foodbakery') . '"',
				'cust_name' => '',
				'required' => false,
			    );
			    $foodbakery_form_fields->foodbakery_form_text_render($foodbakery_opt_array);
			    ?>
	    	    </p>
	    	    <div class="cs-filtermenu-wrap">
	    		<h6><?php esc_html_e('Filter by', 'foodbakery'); ?></h6>
	    		<ul class="cs-filter-menu" id="filters<?php echo intval($rand) ?>">
	    		    <li data-filter="all" class="active"><?php esc_html_e('Show all', 'foodbakery'); ?></li>
				<?php
				foreach ($foodbakery_page_categories_name as $key => $value) {
				    echo '<li data-filter="' . $key . '">' . $value . '</li>';
				}
				?>
	    		</ul>
	    	    </div>
	    	    <div class="cs-filter-inner" id="page_element_container<?php echo intval($rand) ?>">
			    <?php
			    foreach ($foodbakery_page_elements_name as $key => $element_value) {
				echo '<div class="element-item ' . $element_value['categories'] . ' pb_' . esc_js($key) . '">';
				$icon = isset($element_value['icon']) ? $element_value['icon'] : 'accordion-icon';
				?>
				<a href='javascript:foodbakery_shortocde_selection("<?php echo esc_js($key); ?>","<?php echo admin_url('admin-ajax.php'); ?>","composer-<?php echo intval($rand) ?>")'><?php $this->foodbakery_page_composer_elements($element_value['title'], $icon) ?></a>
			    </div>
			<?php } ?>
	    	</div>
	        </div>
	    </div>
	    <div class="cs-page-composer-shortcode"></div>
	    </div>
	    <?php
	    if (isset($shortcode) && $shortcode <> '' && $foodbakery_insert_btn && get_post_type() != 'restaurants') {
		?>
		<a class="button" href="javascript:_createpop('composer-<?php echo esc_js($rand) ?>', 'filter')">
		    <i class="icon-plus-circle"></i> <?php esc_html_e('Foodbakery: Insert shortcode', 'foodbakery'); ?></a>
		<?php
	    }
	}

	public function foodbakery_page_composer_elements($element, $icon) {
	    echo '<i class="fa ' . $icon . '"></i><span data-title="' . $element . '"> ' . $element . '</span>';
	}

    }

    global $foodbakery_shortcode_functions;
    $foodbakery_shortcode_functions = new foodbakery_shortcode_functions();
}