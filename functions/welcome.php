<?php
/**
 * Admin Welcome Screen - Do not delete!
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPEX_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.0
 */
class WPEX_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus') );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome' ) );
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the Welcome and Credits pages.
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_menus() {
		// About
		add_theme_page(
			__( 'Theme Details', 'pg' ),
			__( 'Theme Details', 'pg' ),
			$this->minimum_capability,
			'pg-about',
			array( $this, 'about_screen' )
		);

		/*
		// Recommended
		add_theme_page(
			__( 'Recommendations | Elegant Theme', 'pg' ),
			__( 'Recommendations', 'pg' ),
			$this->minimum_capability,
			'pg-recommended',
			array( $this, 'recommended_screen' )
		);
		*/

	}

	/**
	 * Hide dashboard tabs from the menu
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function admin_head() {
		remove_submenu_page( 'index.php', 'pg-recommended' );
	}

	/**
	 * Navigation tabs
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'pg-about'; ?>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'pg-about' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'pg-about' ), 'index.php' ) ) ); ?>">
				<?php _e( "About", 'pg' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'pg-recommended' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'pg-recommended' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Recommended', 'pg' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Render About Screen
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function about_screen() { ?>
		<div class="wrap about-wrap">
			<?php
			// Get theme version #
			$theme_data = wp_get_theme();
			$theme_version = $theme_data->get( 'Version' );
			$theme_name = $theme_data->get( 'Name' ); ?>

			<h1><?php echo $theme_name; ?> <?php _e( 'Theme', 'pg' ); ?> v<?php echo $theme_version; ?></h1>
			<div class="about-text">
				<?php _e( 'Welcome Geek!', 'pg' ); ?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">

					<br />

					<div>
						<h4><?php _e( 'GPL License', 'pg' );?></h4>
						<p><?php _e( 'This theme is licensed under the GPL license. This means you can use it for anything you like as long as it remains GPL.', 'pg' );?></p>
					</div>
			</div>
			</div>

		</div>
		<?php
	}

	/**
	 * Render Recommended Screen
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function recommended_screen() { ?>
		<div class="wrap about-wrap">

			<h1><?php _e( 'Recommendations', 'pg' ); ?></h1>
			<div class="about-text">
				<?php _e( 'Below are some of the resources we love and recommend.', 'pg' );?>
			</div>

			<?php $this->tabs(); ?>

			<div>
				<div class="feature-section">
					<br />

					<div>
					<h4><?php _e( 'Plugins', 'pg' ); ?></h4>
			
						<ul style="list-style: disc;margin: 20px 0 0 20px;">
							<li><span style="font-weight:bold">SEO:</span> <a href="http://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO</a></li>
							<li><span style="font-weight:bold">Contact Forms:</span> <a href="http://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> or <a href="http://www.pgplorer.com/gravity-forms-plugin/" target="_blank">Gravity Forms</a></li>
							<li><span style="font-weight:bold">Backups:</span> <a href="https://vaultpress.com/" target="_blank">VaultPress</a></li>
							<li><span style="font-weight:bold">Shortcodes:</span> <a href="http://www.pgplorer.com/symple-shortcodes/" target="_blank">Symple Shortcodes</a></li>
							<li><span style="font-weight:bold">Page Builder:</span> <a href="http://www.pgplorer.com/visual-composer-wordpress-plugin/" target="_blank">Visual Composer</a></li>
							<li><span style="font-weight:bold">Image Sliders:</span class> <a href="http://www.pgplorer.com/layer-slider-plugin/" target="_blank">LayerSlider</a></li>
							<li><span style="font-weight:bold">Security:</span> <a href="http://wordpress.org/plugins/limit-login-attempts/" target="_blank">Limit Login Attempts</a>, <a href="http://wordpress.org/plugins/wordfence/screenshots/" target="_blank">WordFence</a> and <a href="hhttp://wordpress.org/plugins/sucuri-scanner/" target="_blank">Sucuri</a></li>
							<li><span style="font-weight:bold">Other:</span> <a href="http://jetpack.me/" target="_blank">JetPack</a></li>
						</ul>
					</div>

					

				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Sends user to the Welcome page on theme activation
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	public function welcome() {
		global $pagenow;
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
			wp_safe_redirect( admin_url( 'admin.php?page=pg-about' ) ); exit;
			exit;
		}
	}
	
}
new WPEX_Welcome();