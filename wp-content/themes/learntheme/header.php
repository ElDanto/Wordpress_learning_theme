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
        //  wp_nav_menu( [
        //     'theme_location'  => 'top-menu',
        //     'container'       => 'nav',
        //     'container_class' => 'header-nav',
        //     'container_id'    => null,
        //     'menu_class'      => 'menu',
        //     'menu_id'         => null,
        // ])
        ?>
        <?php 
        $custom_menu = custom_get_menu('Главное меню');
        // var_dump($custom_menu);

        ?>
        <nav class="header-nav">
            <?php foreach($custom_menu as $key_menu => $item_menu):?>
                <?php
                // var_dump($item_menu);
                    $title = !empty($item_menu->title) ? $item_menu->title : '';
                    $url = !empty($item_menu->url) ? $item_menu->url : '';
                    // echo $title;
                ?>
                
                <?php if($item_menu->wpse_children):?>
                    <span class="item-parent">
                        <a href="<?php echo $url; ?>" class="header-nav-item <?php if ($item_menu->object_id == get_the_id()) {?>current-menu-item <?php };?>" > <?php echo $title; ?> </a>
                        <div class="item-children">
                            <?php foreach($item_menu->wpse_children as $key_children => $item_children):?>
                                <?php
                                    $title = !empty($item_children->title) ? $item_children->title : '';
                                    $url = !empty($item_children->url) ? $item_children->url : '';
                                    // echo $title;
                                ?>
                                <a href="<?php echo $url; ?>" class="header-nav-child <?php if ($item_children->object_id == get_the_id()) {?>current-menu-item <?php };?>" > <?php echo $title; ?> </a>
                            <?php endforeach;?>
                        </div>
                    </span>
                <?php else:?>
                    <a href="<?php echo $url; ?>" class="header-nav-item <?php if ($item_menu->object_id == get_the_id()) {?>current-menu-item <?php };?>" > <?php echo $title; ?> </a>
                <?php endif;?>
            <?php endforeach; ?>
        </nav>

        </header>
        