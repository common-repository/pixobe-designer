<?php
/**
 * The front end facing class.
 *
 * @package pixobe-designer
 */

namespace Plugin\PixobeDesigner\Inc;

use Plugin\PixobeDesigner\Inc\{Pixobe_Constants};

/**
 * The front end facing class.
 */
class Pixobe_Canva_Plugin {


	/**
	 * Single main instance of Plugin PixobeDesigner.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var PixobeDesigner
	 */
	private static $instance;


	/**
	 * Construct
	 */
	public function __construct() {
		add_filter( 'script_loader_tag', array( $this, 'add_filter' ), 10, 3 );
		add_action( 'init', array( $this, 'create_block_pixobe_canva_block_init' ) );
	}

	/**
	 * Ensure that only one instance of Plugin Boilerplate is loaded or can be loaded (Singleton Pattern).
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Pixobe_Canva_Plugin
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	public function create_block_pixobe_canva_block_init() {
		$script_handle = 'pixobe-designer.esm.js';

		wp_register_script(
			$script_handle,
			Pixobe_Constants::plugin_url() . 'www/build/pixobe-designer.esm.js',
			array(),
			Pixobe_Constants::plugin_version(),
			true
		);

		wp_localize_script(
			$script_handle,
			'canvaSettings',
			array(
				'domain' => Pixobe_Constants::plugin_url(),
			)
		);

		register_block_type(
			Pixobe_Constants::plugin_dir() . '/build',
			array(
				'render_callback'     => array( $this, 'canva_renderer_callback' ),
				'view_script_handles' => array( $script_handle ),
			)
		);
	}



	/**
	 * Callback Renderer
	 */
	public function canva_renderer_callback() {
		try {
			ob_start();
			$view = require_once Pixobe_Constants::plugin_dir() . 'views/render-canvas.php';
			if ( file_exists( $view ) ) {
				include $view;
			}
			return ob_get_clean();
		} catch ( \Exception $e ) {
			die( 'Unable to Render View' );
		}
	}


	/**
	 * Undocumented function
	 *
	 * @tag tag
	 * @handle handle
	 * @src source
	 */
	public function add_filter( $tag, $handle, $src ) {
		if ( 'pixobe-designer.esm.js' === $handle ) {
			return wp_get_script_tag(
				array(
					'src'  => $src,
					'type' => 'module',
				)
			);
		}
		if ( 'pixobe-designer.js' === $handle ) {
			return wp_get_script_tag(
				array(
					'src'      => $src,
					'nomodule' => true,
				)
			);
		}
		return $tag;
	}
}
