<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ardent_Medical_Supply
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css" rel="stylesheet">
    <?php wp_head(); ?>
    <?php hide_sidebar_css(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php
    $header_logo = get_field('header_logo', 'option');
    ?>
    <div class="main">
        <header>
            <div class="top-header" style="background-color: #445FAB;">
                <div class="top-hd-wrap">
                    <div class="container">
                        <?php
                        if (have_rows('header_top', 'option')) {
                            while (have_rows('header_top', 'option')) {
                                the_row();
                                $welcome_text = get_sub_field('welcome_text');
                                $facebook = get_sub_field('facebook_url');
                                $instagram = get_sub_field('instagram_url');
                        ?>
                                <div class="top-first">
                                    <p class="fs-14">
                                        <?php echo $welcome_text; ?>
                                    </p>
                                    <div class="right-cn">
                                        <div class="follow d-flex align-item-center">
                                            <p class="fs-14">Follow us:</p>
                                            <div class="icons d-flex align-item-center">
                                                <a href="<?php echo $facebook; ?>"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="<?php echo $instagram; ?>"><i class="fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <div class="track-or">
                                            <div class="truck-img">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delivery-truck.svg" alt="delivery-truck">
                                            </div>
                                            <p><a href="<?php echo site_url('track-order'); ?>" class="fs-14">Track your order</a></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="sec-hs-sec">
                        <div class="container">
                            <div class="m-second">
                                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                                    <?php
                                    if ($header_logo) {
                                        echo wp_get_attachment_image($header_logo, 'full');
                                    }
                                    ?>
                                </a>
                                <div class="form-floating">
                                    <?php
                                    echo do_shortcode('[fibosearch]');
                                    ?>
                                </div>
                                <ul class="login-icons">
                                    <li>
                                        <?php $cart_items_count = get_cart_items_count(); ?>
                                        <a href="<?php echo site_url('cart'); ?>">
                                            <i class="fa-light fa-cart-shopping"><span><?php echo $cart_items_count; ?></span></i>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="<?php echo site_url('cart'); ?>" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-regular fa-user"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            if (is_user_logged_in()) {
                                            ?>
                                                <li class="mb-1">
                                                    <a href="<?php echo site_url('user/admin'); ?>">My Account</a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="mb-1">
                                                    <a href="<?php echo site_url('login'); ?>">Login/Sign-up</a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="third collapse navbar-collapse" id="navbarsExample04">
                        <?php
                        $menu_locations = get_nav_menu_locations();
                        $menu_id = isset($menu_locations['menu-1']) ? $menu_locations['menu-1'] : false;
                        $menus = wp_get_nav_menus();
                        ?>
                        <ul class="navbar-nav navi-list">
                            <?php
                            if ($menu_id) {
                                $menu_items = wp_get_nav_menu_items($menu_id);
                                $menu_item_parents = [];
                                foreach ($menu_items as $menu_item) {
                                    if ($menu_item->menu_item_parent == 0) {
                                        $menu_item_parents[$menu_item->ID] = [];
                                    } else {
                                        $menu_item_parents[$menu_item->menu_item_parent][] = $menu_item;
                                    }
                                }

                                foreach ($menu_items as $menu_item) {
                            ?>
                                    <?php
                                    if (!empty($menu_item_parents[$menu_item->ID])) {
                                    ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link navigation-item dropdown-toggle" href="javascript:void()" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo esc_html($menu_item->title); ?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                if (strtolower($menu_item->title) == "products") {
                                                ?>
                                                    <li><a class="dropdown-item" href="<?php echo esc_url(site_url('shop')); ?>">
                                                            All Products
                                                        </a></li>
                                                <?php
                                                }
                                                foreach ($menu_item_parents[$menu_item->ID] as $child_menu_item) {
                                                ?>
                                                    <li><a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>">
                                                            <?php echo esc_html($child_menu_item->title); ?>
                                                        </a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                    } else {
                                        if ($menu_item->menu_item_parent == 0) {
                                        ?>
                                            <li class="nav-item">
                                                <a class="nav-link navigation-item" href="<?php echo esc_url($menu_item->url); ?>">
                                                    <?php echo esc_html($menu_item->title); ?>
                                                </a>
                                            <?php
                                        }
                                            ?>
                                            </li>
                                <?php
                                    }
                                }
                            }
                                ?>
                        </ul>

                        <div class="contact">
                            <div class="call-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.svg" alt="call">
                            </div>
                            <div class="call-txt">
                                <?php
                                $mobile_phone_number = get_field('mobile_phone_number', 'option');
                                $timings_detail = get_field('timings_detail', 'option');
                                ?>
                                <h6><a href="tel: <?php echo $mobile_phone_number; ?>">
                                        <?php echo $mobile_phone_number; ?>
                                    </a></h6>
                                <p>
                                    <?php echo $timings_detail; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>