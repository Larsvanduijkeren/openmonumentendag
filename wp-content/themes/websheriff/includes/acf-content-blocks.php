<?php
function add_gutenberg_category($categories, $post)
{
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'websheriff',
                'title' => __('Websheriff custom Blocks', 'websheriff'),
            ],
        ]
    );
}

add_filter('block_categories_all', 'add_gutenberg_category', 10, 2);

// Register ACF field blocks
add_action('acf/init', function () {
    if (function_exists('acf_register_block')) {
        acf_register_block([
            'name'            => 'text',
            'mode'            => 'auto',
            'title'           => __('Text'),
            'render_callback' => 'render_callback',
            'category'        => 'websheriff',
            'icon'            => 'editor-code',
            'supports'        => [
                'align' => 'left',
            ],
        ]);
    }
});

// Acf fieldblock render callback
function render_callback($block)
{
// convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
// include a template part from within the "template-parts/block" folder
    locate_template("template-parts/{$slug}.php", true, false);
}

// Set allowed blocks
add_filter('allowed_block_types_all', function ($block_types, $post) {
    $blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
    $output = [];

    foreach ($blocks as $block) {
        if (substr($block->name, 0, 3) === 'acf') {
            $output[] = $block->name;
        }
    };

    return $output;
}, 10, 2);
