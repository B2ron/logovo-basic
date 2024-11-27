<?php

define('DIST_DEF', 'dist');

define('DIST_URI', get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory() . '/' . DIST_DEF);

define('JS_DEPENDENCY', array('jquery')); // array('jquery') as example
define('JS_LOAD_IN_FOOTER', true); // load scripts in footer?

define('VITE_SERVER', 'http://localhost:3000');
define('VITE_ENTRY_POINT', '/main.js');

// enqueue hook
add_action( 'wp_enqueue_scripts', function() {

    wp_enqueue_script( 'jquery' );
    
    if (defined('IS_DEVELOPMENT') && IS_DEVELOPMENT === true) {

        // insert hmr into head for live reload
        function vite_head_module_hook() {
            echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
        }
        add_action('wp_head', 'vite_head_module_hook');        

    } else {

        $manifest = json_decode( file_get_contents( DIST_PATH . '/manifest.json'), true );

        // is ok
        if( is_array($manifest) && ! empty($manifest) ) :
            foreach(@$manifest as $type => $file) :

                // enqueue CSS files
                if( $type == 'main.css' )
                    wp_enqueue_style( 'main', DIST_URI . '/' . $file['file'] );

                // enqueue main JS file
                if( $type == 'main.js' )
                    wp_enqueue_script( 'main-js', DIST_URI . '/' . $file['file'], JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER );

            endforeach;
        endif;

    }

});