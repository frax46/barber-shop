<?php
/**
 * The main template file
 *
 * @package Nicos
 */

get_header();
?>
    <section class="intro">
        <?php display_hero_lines(); ?>
        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg" id="intro-svg">
            <path id="path1" d="M9.75 14.625C12.4424 14.625 14.625 12.4424 14.625 9.75C14.625 7.05761 12.4424 4.875 9.75 4.875C7.05761 4.875 4.875 7.05761 4.875 9.75C4.875 12.4424 7.05761 14.625 9.75 14.625Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path id="path2" d="M13.195 13.195L19.5 19.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path id="path3" d="M32.5 6.5L13.195 25.805" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path id="path4" d="M9.75 34.125C12.4424 34.125 14.625 31.9424 14.625 29.25C14.625 26.5576 12.4424 24.375 9.75 24.375C7.05761 24.375 4.875 26.5576 4.875 29.25C4.875 31.9424 7.05761 34.125 9.75 34.125Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path id="path5" d="M24.05 24.05L32.5 32.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </section>
    <section class="cards">
        <div class="card">
            <div class="card-marquee">
                <div class="marquee">
                    <h1>Nico's Barber</h1>
                    <h1>Bespoke Shaves</h1>
                    <h1>Haircuts</h1>
                    <h1>Beard Trims</h1>
                    <h1>Haircuts</h1>
                    <h1>Beard Trims</h1>
                </div>
            </div>
            <div class="card-wrapper">
                <div class="card-content">
                   <div class="title">
                    <h1><?php echo esc_html(get_hero_field('card_1_title', 'Welcome to Nicos')); ?></h1>
                   </div>
                   <div class="description">
                    <p><?php echo esc_html(get_hero_field('card_1_description', 'Welcome to Nicos')); ?></p>
                   </div>
                </div>
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/barber-1.jpg" alt="Barber">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-wrapper">
                <div class="card-content">
                   <div class="title">
                    <h1><?php echo esc_html(get_hero_field('card_2_title', 'Welcome to Nicos')); ?></h1>
                   </div>
                   <div class="description">
                    <p><?php echo esc_html(get_hero_field('card_2_description', 'Welcome to Nicos')); ?></p>
                   </div>
                </div>
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/barber-2.jpg" alt="Barber">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-wrapper">
                <div class="card-content">
                   <div class="title">
                    <h1><?php echo esc_html(get_hero_field('card_3_title', 'Welcome to Nicos')); ?></h1>
                   </div>
                   <div class="description">
                    <p><?php echo esc_html(get_hero_field('card_3_description', 'Welcome to Nicos')); ?></p>
                   </div>
                </div>
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/barber-3.jpg" alt="Barber">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-wrapper">
                <div class="card-content">
                   <div class="title">
                    <h1><?php echo esc_html(get_hero_field('card_4_title', 'Welcome to Nicos')); ?></h1>
                   </div>
                   <div class="description">
                    <p><?php echo esc_html(get_hero_field('card_4_description', 'Welcome to Nicos')); ?></p>
                   </div>
                </div>
                <div class="card-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/barber-4.jpg" alt="Barber">
                </div>
            </div>
        </div>
        
        

    </section>
    <section class="outro">
        <h1>We aspire to be the best</h1>
    </section>


<?php get_footer(); ?>