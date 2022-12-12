<?php
/*
Template Name:Home page
*/

?>
<?php get_header();
$fields = get_fields();
$why_block_rep = $fields['why_block_repeater'];
$gallery_images = $fields['gallery'];
$args = array(
    'post_type' => 'apartments',
    'posts_per_page' => -1,
    'orderby' => array(
        'date' => 'ASC',
        'menu_order' => 'ASC',
    )
);
$query = new WP_Query($args);
?>
<main>
    <section class="hero-block" style="background-image: url(<?php echo $fields['hero_block_bg']; ?> );">
        <div class="bg"></div>
        <div class="hero-block-content container">
            <div class="hero-block-text">
                <h1 class="hero-block-title"><?php echo $fields['hero_block_title'] ?? ''; ?></h1>
                <p class="hero-block-description"><?php echo $fields['hero_block_description'] ?? ''; ?></p>
            </div>
            <div class="hero-block-form">
                <?php echo do_shortcode($fields['hero_block_form']) ?? ''; ?>
            </div>
        </div>
    </section>
    <section class="why-block">
        <h2 class="why-block-title"><?php echo $fields['why_block_title'] ?? ''; ?></h2>
        <div class="why-block-pluses container">
            <div class="why-block-pluses-numbers">
                <?php foreach ($why_block_rep as $value) : ?>
                    <div class="why-block-adv">
                        <h3 class="why-block-discount"><?php echo $value['number'] ?? ''; ?></h3>
                        <p class="why-block-discount-text"><?php echo $value['text'] ?? ''; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="why-block-text">
                <?php echo $fields['why_block_description'] ?? ''; ?>
            </div>
        </div>

    </section>
    <section class="gallery-block container">
        <div class="gallery-block-images">

            <div class="gallery-entry gallery-image">
                <?php
                $i = 0;
                foreach ($gallery_images as $image):
                    if ($i >= 3) {
                        break;
                    } else { ?>
                        <img src="<?php echo $image ?? ''; ?>" alt="img">
                        <?php
                        $i++;
                    } endforeach; ?>
            </div>

        </div>
        <a href="" id="load-gallery" data-count="3"><?php echo $fields['gallery_button'] ?? ''; ?></a>
    </section>
    <section class="apartments-block container">
        <h2 class="apartment-block-title"><?php echo $fields['apartments_block_title'] ?? ''; ?></h2>
        <div class="apartments-block-all">
            <?php while ($query->have_posts()) :
                $query->the_post();
                global $post;
                $ID = $post->ID;
                $acf_fields = get_fields($ID);
                $apartment_image = $acf_fields['apartment_photo']['ID'];

                ?>
                <div class="apartments-block-solo">
                    <?php echo wp_get_attachment_image($apartment_image ?? '', 'full') ?>
                    <h2 class="apartments-block-solo-title"><?php echo $acf_fields["apartment_title"] ?? ''; ?><span
                                class="apartments-block-solo-square"><?php echo $acf_fields["apartment_square"] ?? ''; ?></span>
                    </h2>
                    <p class="apartments-block-solo-seats"><?php echo $acf_fields["seats_number"] ?? ''; ?></p>
                    <ul>
                        <?php foreach ($acf_fields['apartment_options_repater'] as $option) : ?>
                            <li><?php echo $option['option'] ?? ''; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="apartments-block-solo-price"><?php echo $acf_fields["apartment_price"] ?? '' ?></p>
                    <a class="apartments-block-solo-button"
                       href="#"><?php echo $acf_fields["apartment_button"] ?? '' ?></a>
                </div>
            <?php endwhile; ?>
    </section>
</main>
<?php get_footer(); ?>
