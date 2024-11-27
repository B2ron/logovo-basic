<?php

$text = 'ТЕКСТОВЫЙ БЛОК';

if( function_exists('get_field') ) :
    $text = ! empty(get_field('text')) ? get_field('text') : $text;
endif;

echo "<section id='text'>";

    echo ( ! empty($text) ) ? "<div class='text'>{$text}</div>" : '';
    
echo "</section>";