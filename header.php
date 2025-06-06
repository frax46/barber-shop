<?php
/**
 * The header for our theme
 *
 * @package Radipress
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_front_page()) : ?>
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <meta name="keywords" content="landscaping, garden design, lawn care, outdoor spaces, landscape maintenance">
    <?php endif; ?>
    <meta name="author" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta name="robots" content="index, follow">
    
    <?php if (is_front_page()) : ?>
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="<?php echo esc_attr(get_bloginfo('name')); ?> - Professional Garden & Landscape Services">
    <meta property="og:description" content="Transform your outdoor space with our professional landscaping services. Gardens, patios, and sustainable landscape solutions.">
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/images/og-image.jpg">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:type" content="website">
    
    <!-- Schema Markup for Local Business -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LandscapingBusiness",
      "name": "<?php echo esc_attr(get_bloginfo('name')); ?>",
      "image": "<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.jpg",
      "url": "<?php echo esc_url(home_url('/')); ?>",
      "telephone": "+1-555-123-4567",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "123 Garden Path",
        "addressLocality": "Green Valley",
        "addressRegion": "CA",
        "postalCode": "90210",
        "addressCountry": "US"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 34.0522,
        "longitude": -118.2437
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday"
        ],
        "opens": "08:00",
        "closes": "18:00"
      },
      "sameAs": [
        "https://www.facebook.com/radilandscapes",
        "https://www.instagram.com/radilandscapes",
        "https://www.linkedin.com/company/radilandscapes"
      ]
    }
    </script>
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/apple-touch-icon.png">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header>
      <div class="btn" id="toggle-btn">
        <div class="btn-outline btn-outline-1"></div>
        <div class="btn-outline btn-outline-2"></div>
        <div class="hamburger">
          <span></span>
        </div>
      </div>

      <div class="menu">
        <div class="primary-menu">
          <div class="menu-container">
            <div class="menu-wrapper">
              <div class="menu-item">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <div class="menu-item-revealer"></div>
              </div>
              <div class="menu-item">
                <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
                <div class="menu-item-revealer"></div>
              </div>
              <div class="menu-item">
                <a href="<?php echo esc_url(home_url('/services')); ?>">Services</a>
                <div class="menu-item-revealer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
      
        
    </header> 