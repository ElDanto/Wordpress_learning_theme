<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Учебный сайт</title>
    <?php wp_head(); ?>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
							<a href="#">
								<img class="header-logo-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo">
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        <?php
         wp_nav_menu( [
            'theme_location'  => 'top-menu',
            'container'       => 'nav',
            'container_class' => 'header-nav',
            'container_id'    => null,
            'menu_class'      => 'menu',
            'menu_id'         => null,
        ])?>
        <?php 
        ///$custom_menu = custom_get_menu('Главное меню');
        // var_dump($custom_menu);

        ?>

        </header>