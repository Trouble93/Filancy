<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<div class="adv-block"></div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <title><?php wp_title() ?></title>
    <?php wp_head() ?>
</head>
<body>

<header>
    <div class="header-menu">
        <div class="logo">
            <?php echo get_custom_logo(); ?>
        </div>
        <div class="main-menu">
            <?php wp_nav_menu(['theme_location' => 'init_menu']); ?>
        </div>
        <div class="contacts">
            <p class="phone-number">+38 (067) 761-20-17</p>
            <a href="#">Заказать звонок</a>
        </div>
        <img class="open-menu" onclick="openNav()"
             src="<?php echo get_site_url() ?>/wp-content/themes/filancy/assets/images/gamburger.png" alt="">
        <div id="myNav" class="overlay">
            <?php wp_nav_menu(['theme_location' => 'init_menu']); ?>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
    </div>
</header>




