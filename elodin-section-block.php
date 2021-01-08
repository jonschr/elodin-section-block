<?php
/*
	Plugin Name: Elodin Block: Sections
	Plugin URI: https://github.com/jonschr/elodin-section-block
    Description: Just another section block
	Version: 1.0.9
    Author: Jon Schroeder
    Author URI: https://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/

/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'ELODIN_SECTION_BLOCK', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'ELODIN_SECTION_BLOCK_VERSION', '1.0.9' );

require_once( 'acf-json/fields.php' );

add_action('acf/init', 'elodin_section_block_register_block');
function elodin_section_block_register_block() {

    // Check function exists.
    if( function_exists( 'acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'section',
            'title'             => __('Section'),
            'description'       => __('A section block'),
            'render_callback'   => 'elodin_section_block_render',
            'enqueue_assets'    => 'elodin_section_block_enqueue',
            'category'          => 'formatting',
            'icon'              => 'align-full-width',
            'keywords'          => array( 'section', 'container', 'full', 'fullwidth', 'video', 'slideshow', 'slider' ),
            'mode'              => 'preview',
            'align'              => 'full',
            'supports'          => array(
                'align' => array( 'full', 'wide', 'normal' ),
                'mode' => false,
                'jsx' => true
            ),
        ));
    }
}

function elodin_section_block_render( $block, $content = '', $is_preview = false, $post_id = 0 ) {
    
    //* Default class
    $className = 'elodin-section';
    
    //* Default ID
    $id = 'section-' . $block['id'];
    
    //* Get settings
    $background_image = get_field( 'background_image' );
    $background_color = get_field( 'background_color' );
    $background_opacity = get_field( 'background_opacity' );
    
    $background_saturation = get_field( 'background_saturation' );
    $background_grayscale = 0;
    
    if ( isset($background_saturation) )
        $background_grayscale = 1 - ( $background_saturation / 100 ); // convert the saturation percentage into a grayscale fraction
        
    $background_attachment = get_field( 'background_attachment' );
    $background_repeat = get_field( 'background_repeat' );
    $section_background_color = get_field( 'section_background_color' );
    $minimum_height = get_field( 'minimum_height' );
    $minimum_height_mobile = get_field( 'minimum_height_mobile' );
    $max_width = get_field( 'max_width' );
    $alignment_horizontal = get_field( 'alignment_horizontal' );
    $alignment_vertical = get_field( 'alignment_vertical' );
    $inner_max_width = get_field( 'inner_content_max_width' );
    $mp4_file = get_field( 'mp4_file' );
    $webm_file = get_field( 'webm_file' );
    $padding_top = get_field( 'padding_top' );
    $padding_bottom = get_field( 'padding_bottom' );
    $padding_left = get_field( 'padding_left' );
    $padding_right = get_field( 'padding_right' );
    $video_url = null; // to be added in a future release
    $style = null;

    // Create id attribute allowing for custom "anchor" value.
    if( !empty($block['anchor']) ) 
        $id = $block['anchor'];

    // Create class attribute allowing for custom "className" and "align" values.
    if( !empty($block['className']) )
        $className .= ' ' . $block['className'];

    if( !empty($block['align']) )
        $className .= ' align' . $block['align'];
            
    if ( $background_attachment == 'fixed' )
        $className .= ' ' . 'background-fixed';
        
    // this is distinct from the Gutenberg alignment setting
    if ( $alignment_horizontal )
        $className .= ' ' . 'align-horizontal-' . $alignment_horizontal;
        
    // this is distinct from the Gutenberg alignment setting
    if ( $alignment_vertical )
        $className .= ' ' . 'align-vertical-' . $alignment_vertical;
        
    if ( !isset($background_opacity) ) {
        $background_opacity = 1;
    } else {
        $background_opacity = $background_opacity / 100;
    }
    
    //* color matching for background colors
    $colors = current( (array) get_theme_support( 'editor-color-palette' ) );
    if ( $colors ) {
        foreach( $colors as $color ) {
            if ( in_array( $background_color, $color ) ) {
                $className .= ' has-' . $color['slug'] . '-background-color';
                $background_color = null;
            }            
        }
    }
    
    if ( $background_color )
        $style = sprintf( 'background-color:%s;', $background_color );
                    
    //* Render
    printf( '<div id="%s" class="%s" style="%s">', $id, $className, $style );
    
        //* Background image 
        if ( $background_image )
            printf( '<div class="section-image" style="background-image:url(%s);opacity:%s;filter:grayscale(%s);"></div>', $background_image, $background_opacity, $background_grayscale );
        
        //* Background video
        if ( $mp4_file || $webm_file || $video_url ) {
            
            printf( '<video class="section-video" autoplay muted loop playsinline poster="%s" preload="auto" style="opacity:%s;">', $image_fallback, $background_opacity );
    
                if ( $video_url )
                    printf( '<source src="%s" type="video/mp4">', $video_url );
    
                if ( $mp4_file && !$video_url )
                    printf( '<source src="%s" type="video/mp4">', $mp4_file );
    
                if ( $webm_file && !$video_url )
                    printf( '<source src="%s" type="video/webm">', $webm_file );
    
            echo '</video>';
            
        }
            
        //* Content area
        printf( '<div class="section-content" style="max-width:%spx;">', $max_width );
            printf( '<div class="section-content-wrap" style="max-width:%spx;">', $inner_max_width );
                echo '<InnerBlocks />';
            echo '</div>';
        echo '</div>';
        
        if ( isset($padding_top) || isset($padding_bottom) || isset($padding_left) || isset($padding_right) ) {
            ?>
            <style>
                /* Padding */
                @media( min-width: 960px ) { 
                    #section-<?php echo $block['id']; ?> {
                        padding-top: <?php echo $padding_top; ?>% !important;
                        padding-bottom: <?php echo $padding_bottom; ?>% !important;
                        padding-left: <?php echo $padding_left; ?>% !important;
                        padding-right: <?php echo $padding_right; ?>% !important;
                    }
                }
            </style>
            <?php
        }
        
        if ( isset( $minimum_height ) ) {
            ?>
            <style>
                #section-<?php echo $block['id']; ?> {
                    min-height: <?php echo $minimum_height; ?>vh;
                }
            </style>
            <?php
        }
        
        if ( isset( $minimum_height_mobile ) ) {
            ?>
            <style>
                @media( max-width: 960px ) { 
                    #section-<?php echo $block['id']; ?> {
                        min-height: <?php echo $minimum_height_mobile; ?>vh;
                    }
                }
            </style>
            <?php
        }
        
        if ( isset( $background_repeat ) ) {
            if ( $background_repeat == 'texture' ) {
                ?>
                <style>
                    #section-<?php echo $block['id']; ?> .section-image {
                        background-size: auto;
                        background-repeat: repeat;
                        background-position: center center;
                    }
                </style>
                <?php
            }
        }
                
    echo '</div>';
   
}

function elodin_section_block_enqueue() {
    wp_enqueue_style( 'section-block-style', plugin_dir_url( __FILE__ ) . 'css/section.css', array(), ELODIN_SECTION_BLOCK_VERSION, 'screen' );
}

function elodin_section_block_get_the_colors_formatted_for_acf() {
	
	// get the colors
    $color_palette = current( (array) get_theme_support( 'editor-color-palette' ) );

	// bail if there aren't any colors found
	if ( !$color_palette )
		return;

	// output begins
	ob_start();

	// output the names in a string
	echo '[';
		foreach ( $color_palette as $color ) {
			echo "'" . $color['color'] . "', ";
		}
	echo ']';
    
    return ob_get_clean();

}

add_action( 'acf/input/admin_footer', 'elodin_section_block_register_acf_color_palette' );
function elodin_section_block_register_acf_color_palette() {

    $color_palette = elodin_section_block_get_the_colors_formatted_for_acf();
    if ( !$color_palette )
        return;
    
    ?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){

                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = <?php echo $color_palette; ?>

                // return colors
                return args;

            });
        })(jQuery);
    </script>
    <?php

}

// Updater
require 'vendor/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/jonschr/elodin-section-block',
	__FILE__,
	'elodin-section-block'
);

// Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');