<?php

$image = get_template_directory_uri() . '/img/nature.jpg';

if( function_exists('get_field') ) :
    $image = ! empty(get_field('image')['url']) ? get_field('image')['url'] : $image;
endif;

echo "<section id='image'>";
    
    echo ( ! empty($image) ) ? "<div class='image'><img src='{$image}' /></div>" : ''; 
    
echo "</section>";