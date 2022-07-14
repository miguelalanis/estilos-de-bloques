<?php

/**
 * Plugin Name: Estilos de bloques
 * Plugin URI: https://github.com/miguelalanis/estilos-de-bloques
 * Description: Un sencillo plugin para demostrar cómo añadir estilos de bloque a Gutenberg. Basado en el repositorio https://github.com/Automattic/gutenberg-block-styles
 * Version: 1.0
 * Author: Miguel Alanís
 */

/**
 * Register Custom Block Styles
 */
if ( function_exists( 'register_block_style' ) ) {
	function block_styles_register_block_styles() {
		/**
		 * Register block style
		 */
		register_block_style(
			'core/paragraph',
				 array(
					'name'  => 'blue-paragraph',
					'label' => __( 'Blue Paragraph', 'textdomain' ),
					'inline_style' => '
					.is-style-blue-paragraph {  
						background-color: #0087be;
	                    color: #FFF;
	                    padding: 16px;
										}
                        ',
				)
			
			);
	}

	add_action( 'init', 'block_styles_register_block_styles' );
