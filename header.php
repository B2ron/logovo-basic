<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <?php /* Fonts */ ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    $logo = '';
    $phone = '';
    if( function_exists('get_field') ) :
        $logo = get_field('logo', 'option');
        $phone = get_field('phone', 'option');
    endif; ?>

    <header id="header">  
        <?php echo ( ! empty($logo['url']) ) ? "<div class='logo'><img src='{$logo['url']}' /></div>" : ''; ?>      
        <?php echo ( ! empty($phone) ) ? "<div class='phone'>{$phone}</div>" : ''; ?>
    </header>