<?php
/**
 * The front end facing class.
 *
 * @package pixobe-affiliates
 */

namespace Plugin\PixobeDesigner\Inc;

/**
 * The front end facing class.
 */
class Pixobe_Constants {

	private const PLUGIN_NAME    = 'Pixobe Designer';
	private const PLUGIN_VERSION = '1.0.0';
	private const PLUGIN_SLUG    = 'pixobe-designer';

	/**
	 * Plugin Name
	 */
	public static function plugin_name() {
		return self::PLUGIN_NAME;
	}

	/**
	 * Auto Generated Document
	 */
	public static function plugin_version() {
		return self::PLUGIN_VERSION;
	}

	/**
	 * Auto Generated Document
	 */
	public static function plugin_slug() {
		return self::PLUGIN_SLUG;
	}

	/**
	 * Auto Generated Document
	 */
	public static function plugin_dir() {
		return plugin_dir_path( __DIR__ );
	}

	/**
	 * Auto Generated Document
	 */
	public static function plugin_url() {
		return plugin_dir_url( __DIR__ );
	}

}
