<?php
include 'includes/acf-content-blocks.php';

// Disable admin bar
show_admin_bar(false);

// ACF options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

// Make sure all content is pasted as text
add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');
function ag_tinymce_paste_as_text($init)
{
    $init['paste_as_text'] = true;
    return $init;
}

// Remove comment support
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('init', 'remove_comment_support', 100);

add_action('admin_menu', 'remove_default_post_menu');

function remove_default_post_menu() {
    remove_menu_page('edit.php'); // Removes 'Posts'
}

function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}

// Styles for gutenberg editor
function custom_gutenberg_assets()
{
    // Enqueue block editor JS
    wp_enqueue_style(
        'custom-gutenberg-stylesheet',
        get_template_directory_uri() . '/min/gutenberg.css',
        [],
        wp_get_theme()->get('Version'), 'all');
}

add_action('enqueue_block_editor_assets', 'custom_gutenberg_assets');

// Disable notification emails
add_filter('auto_theme_update_send_email', '__return_false');
add_filter('auto_core_update_send_email', '__return_false');
add_filter('auto_plugin_update_send_email', '__return_false');

// Permission for editor edit menus
$role_object = get_role('editor');
$role_object->add_cap('edit_theme_options');
