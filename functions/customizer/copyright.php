<?php
/**
 * Copyright theme options
 * 
 * 
 * @since ProfitGeeks 1.0
 */



add_action( 'customize_register', 'pg_customizer_copyright' );

function pg_customizer_copyright($wp_customize) {

	// Add textarea
	class ATT_Customize_Textarea_Control extends WP_Customize_Control {
		
		//Type of customize control being rendered.
		public $type = 'textarea';

		//Displays the textarea on the customize screen.
		public function render_content() { ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	// Copyright Section
	$wp_customize->add_section( 'pg_copyright' , array(
		'title'		=> __( 'Copyright', 'pg' ),
		'priority'	=> 204,
	) );
	$wp_customize->add_setting( 'pg_copyright', array(
		'type'		=> 'theme_mod',
		'default'	=> 'Development by <a href="http://www.profitgeeks.org" target="_blank" title="ProfitGeeksr">ProfitGeeks</a>',
		'sanitize_callback' => 'sanitize_text_field'
			
	) );

	$wp_customize->add_control( new ATT_Customize_Textarea_Control( $wp_customize, 'pg_copyright', array(
		'label'		=> __('Custom Copyright','pg'),
		'section'	=> 'pg_copyright',
		'settings'	=> 'pg_copyright',
		'type'		=> 'textarea',
	) ) );
		
}