<?php

/**
 * The shortcode functionality of the plugin.
 *
 * @link       http://www.flowdee.de
 * @since      1.0.0
 *
 * @package    Blueposts
 * @subpackage Blueposts/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Blueposts
 * @subpackage Blueposts/admin
 * @author     flowdee <support@flowdee.de>
 */
class Blueposts_Shortcodes {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $name    The ID of this plugin.
	 */
	private $name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $name       The name of the plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $name, $version ) {

		$this->name = $name;
		$this->version = $version;
		$this->setup_shortcodes();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function setup_shortcodes() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Blueposts_Public_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blueposts_Public_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// register shortcodes here
		add_shortcode('bluepost', function ($atts, $content) {
	    extract(shortcode_atts(array(
	        'title' => null,
	        'link' => null,
					'game' => null
	    ), $atts));

			$bluepost_game = '';

			if($game) {
				switch ($game) {
			    case "hearthstone":
			        $bluepost_game = ' bluepost--hearthstone';
			        break;
			    case "diablo":
			        $bluepost_game = ' bluepost--diablo';
			        break;
				}
			}

	    ob_start();
	    ?>

	    <blockquote class="bluepost<?php echo $bluepost_game; ?>">
	        <?php if($title) { ?>
	            <div class="bluepost__title">
	                <?php if($link) { ?>
	                    <a href="<?php echo $link; ?>">
									<?php } ?>
													<span class="bluepost__icon"></span>
	                        <?php echo $title; ?>
									<?php if($link) { ?>
	                    </a>
	                <?php } ?>
	            </div>
	        <?php } ?>

	        <?php echo do_shortcode(trim($content)); ?>
	    </blockquote>

	    <?php

	    $out = ob_get_clean();
	    return $out;
		});

	}

}
