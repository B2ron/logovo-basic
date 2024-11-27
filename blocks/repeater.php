<?php 

$repeater = '';
if( function_exists('get_field') ) :
    $repeater = get_field('repeater');
endif;

echo "<section id='repeater'>";
    
    if( ! empty($repeater) ) :
        echo "<ul>";
            foreach( $repeater as $item ) :
                echo ( ! empty($item['text'])) ? "<li>{$item['text']}</li>" : '';
            endforeach;
        echo "</ul>";
    endif;
    
echo "</section>";