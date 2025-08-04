<?php
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');
$image = get_field('image');

$id = get_field('id');
?>

<section
    class="text"
    id="<?php echo $id; ?>"
>
    <div class="container">
        <div class="flex-wrapper">
            <div class="content">
                <h1><?php echo get_the_title(); ?></h1>

                <?php if (empty($text) === false) {
                    echo $text;
                } ?>

                <?php if (empty($buttons) === false) : ?>
                    <div class="buttons">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if (empty($button['button']) === false) {
                                echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['button']['url'], $button['button']['target'], $button['button']['title']);
                            } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (empty($image) === false) : ?>
                <span class="image">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                </span>
            <?php endif; ?>
        </div>
    </div>
</section>
