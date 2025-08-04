<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo wp_title(); ?></title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/min/main.css"/>
</head>

<body <?php body_class(); ?>>

<div class="page-wrapper">
    <div class="page-content">
        <header class='header'>
            <div class='container'>
                <div class="flex-wrapper">
                    <a href='/' class='logo'>
                        Logo Herderewich

                        <img src="/wp-content/themes/websheriff/library/images/logo.svg" alt="Logo Herderwich">
                    </a>
                </div>
            </div>
        </header>
