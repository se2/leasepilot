<?php
/**
 * Add custom styles to the tinymce editor
 */
class LeasePilot_TinyMCE_Styles
{
	// Singleton Instance
	protected static $inst;
	public static function getInstance() {
		if( !isset( self::$inst ) ) {
			self::$inst = new self();
		}
		return self::$inst;
	}
	public static function init()
	{
		return self::getInstance();
	}

	protected function __construct()
	{
		add_filter('mce_buttons_2', [$this, 'addStyleSelect'], 9999 );
		add_filter('tiny_mce_before_init', [$this, 'addStyles'] );
	}

	public function addStyleSelect( $buttons )
	{
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}


	public function addStyles( $settings )
	{
		$styles = [
			['title' => 'Blockquote', 'items' => [
				[
					'title' => 'Quotemark',
					'block' => 'blockquote',
					'classes' => 'blockquote',
					'wrapper' => true
				],[
					'title' => 'Ending Quotemark',
					'block' => 'blockquote',
					'classes' => 'blockquote blockquote--end',
					'wrapper' => true
				],[
					'title' => 'Pull Left',
					'block' => 'blockquote',
					'classes' => 'pull-left',
					'wrapper' => false
				],[
					'title' => 'Pull Right',
					'block' => 'blockquote',
					'classes' => 'pull-right',
					'wrapper' => false
				],[
					'title' => 'Source',
					'block' => 'p',
					'classes' => 'blockquote__source',
					'wrapper' => false
				]
			]],
			['title' => 'Colors', 'items' => [
				[
					'title' => 'Primary',
					'inline' => 'span',
					'classes' => 'primary-color',
					'wrapper' => true
				],[
					'title' => 'Secondary',
					'inline' => 'span',
					'classes' => 'secondary-color',
					'wrapper' => true
				]
			]],
		];
		$settings['style_formats'] = json_encode( $styles );
		return $settings;
	}

}

LeasePilot_TinyMCE_Styles::init();
