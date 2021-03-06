<?php

/**
 * UI Class, handles rendering of, well.. the UI.. 
 */
class SC_UI {
	
	/**
	 * Render the login form
	 * 
	 * @param       array|null         $args
	 * 
	 * @returns     void
	 */
	static function render_login_form( $args = NULL )
	{
	
		if ( $args == NULL )
		{
			$display_label = true;
		}
			elseif ( is_array( $args ) )
		{
			extract( $args );
		}
	
		?>
		<div class="social_connect_ui <?php if( strpos( $_SERVER['REQUEST_URI'], 'wp-signup.php' ) ) echo 'mu_signup'; ?>">
			<?php if( $display_label !== false ) : ?>
				<div style="margin-bottom: 3px;"><label><?php _e( 'Connect with', 'social_connect' ); ?>:</label></div>
			<?php endif; ?>
			<div class="social_connect_form" title="Social Connect">
				<?php do_action('social_connect_button_list'); ?>
			</div>
		</div>
		<?php
	}
	
	/**
	 * Render hidden input field with login page uri
	 * 
	 * @returns	void							
	 */
	static function render_login_page_uri()
	{
		echo '<input type="hidden" id="social_connect_login_form_uri" value="' . site_url( 'wp-login.php', 'login_post' ) . '" />';
	}
	
	/**
	 * Helper function that can be used in templates
	 * 
	 * @returns	void							
	 */
	static function show_social_connect()
	{
		if( !is_user_logged_in())
		{
			static::render_login_form();
		}
	}
	
}

