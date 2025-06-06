<?php
/**
 * Template Name: Services Page
 * The template for displaying the Services page
 *
 * @package Nicos
 */

get_header();
?>

<section class="services-hero">
    <!-- Background masked text -->
    <div class="background-masked-text">
        <div class="masked-text-overlay">
            <h2 class="brand-text" data-text="CUTS">CUTS</h2>
            <p class="brand-subtitle">& SHAVES</p>
        </div>
    </div>
    
    <!-- Main content overlay with glass effect -->
    <div class="services-container">
        <div class="services-content-card">
            <div class="services-text">
                <h1 class="services-title"><?php echo esc_html(get_hero_field('service_title', ' styling')); ?></h1>
                <p class="services-description">
                    <?php echo esc_html(get_hero_field('services_description', 'Premium barbering services crafted with precision and passion. From classic cuts to modern styles.')); ?>
                </p>
                <div class="services-highlights">
                    <div class="highlight-item">
                        <span class="highlight-icon">✂️</span>
                        <span class="highlight-text">Classic Cuts</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">🪒</span>
                        <span class="highlight-text">Hot Towel Shaves</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-icon">💈</span>
                        <span class="highlight-text">Beard Styling</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-grid">
    <div class="grid-container">
        <h2 class="grid-title">What We Offer</h2>
        <div class="services-list">
            <div class="service-card">
                <div class="service-icon">✂️</div>
                <h3 class="service-name">Classic Haircut</h3>
                <p class="service-description">Traditional scissor cuts with attention to detail and personal style.</p>
                <span class="service-price">$35</span>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🪒</div>
                <h3 class="service-name">Straight Razor Shave</h3>
                <p class="service-description">Hot towel treatment followed by precision straight razor shave.</p>
                <span class="service-price">$45</span>
            </div>
            
            <div class="service-card">
                <div class="service-icon">💈</div>
                <h3 class="service-name">Beard Trim & Style</h3>
                <p class="service-description">Professional beard shaping and styling to complement your look.</p>
                <span class="service-price">$25</span>
            </div>
            
            <div class="service-card">
                <div class="service-icon">🎯</div>
                <h3 class="service-name">Full Service</h3>
                <p class="service-description">Complete grooming experience - cut, shave, and styling.</p>
                <span class="service-price">$65</span>
            </div>
        </div>
    </div>
</section>

<style>
.services-hero {
    min-height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2em;
    background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
    color: white;
    overflow: hidden;
}

/* Background masked text */
.background-masked-text {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0;
}

.services-container {
    position: relative;
    z-index: 2;
    max-width: 600px;
    width: 100%;
}

/* Glass effect card for main content */
.services-content-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    padding: 3em;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    opacity: 0;
    transform: translateY(50px);
}

.services-text {
    text-align: center;
}

.services-title {
    font-size: 3rem;
    font-weight: 600;
    margin-bottom: 1em;
    background: linear-gradient(45deg, #fff, #ccc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.services-description {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 2em;
    opacity: 0.9;
    text-align: center;
}

.services-highlights {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5em;
    margin-top: 2em;
}

.highlight-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5em;
    text-align: center;
    opacity: 0;
    transform: translateY(30px);
}

.highlight-icon {
    font-size: 1.5rem;
}

.highlight-text {
    font-size: 1.1rem;
    font-weight: 500;
}

/* Masked Text Overlay - positioned as background */
.masked-text-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

.brand-text {
    font-size: 20rem;
    font-weight: 900;
    letter-spacing: 0.05em;
    margin: 0;
    text-align: center;
    font-family: 'Inter', sans-serif;
    line-height: 0.8;
    opacity: 0.3;
    
    /* PNG Image masking effect - image shows through text */
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-1.jpg') center/cover;
    background-attachment: fixed;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
    
    /* Fallback for browsers that don't support background-clip */
    background-color: #fff;
    background-blend-mode: normal;
}

/* Add a pseudo-element for better browser support */
.brand-text::before {
    content: attr(data-text);
    position: absolute;
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-1.jpg') center/cover;
    background-attachment: fixed;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
    z-index: -1;
}

.brand-subtitle {
    font-size: 2rem;
    font-weight: 600;
    letter-spacing: 0.8em;
    margin: -1em 0 0 0;
    text-align: center;
    font-family: 'Inter', sans-serif;
    opacity: 0.3;
    
    /* Apply same masking effect to subtitle */
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-1.jpg') center/cover;
    background-attachment: fixed;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
}

.services-grid {
    padding: 6em 2em;
    background: #0f0f0f;
    color: white;
}

.grid-container {
    max-width: 1200px;
    margin: 0 auto;
}

.grid-title {
    font-size: 3rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 3em;
    opacity: 0;
    transform: translateY(50px);
}

.services-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2em;
}

.service-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2.5em;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(30px);
}

.service-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.08);
}

.service-icon {
    font-size: 3rem;
    margin-bottom: 1em;
}

.service-name {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1em;
}

.service-description {
    font-size: 1rem;
    line-height: 1.6;
    opacity: 0.8;
    margin-bottom: 1.5em;
}

.service-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5em 1em;
    border-radius: 25px;
    display: inline-block;
}

@media (max-width: 768px) {
    .services-container {
        max-width: 90%;
    }
    
    .services-content-card {
        padding: 2em;
        border-radius: 20px;
    }
    
    .services-title {
        font-size: 2.5rem;
    }
    
    .services-highlights {
        grid-template-columns: 1fr;
        gap: 1.5em;
    }
    
    .brand-text {
        font-size: 12rem;
        line-height: 0.7;
    }
    
    .brand-subtitle {
        font-size: 1.5rem;
        letter-spacing: 0.6em;
        margin: -0.5em 0 0 0;
    }
    
    .services-list {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Services page animations
    function initServicesAnimations() {
        const tl = gsap.timeline();
        
        // Animate background masked text first
        tl.to('.background-masked-text', {
            opacity: 1,
            duration: 1.5,
            ease: "power2.out"
        })
        
        // Animate the glass content card
        .to('.services-content-card', {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out"
        }, "-=0.8")
        
        // Animate highlight items
        .to('.highlight-item', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        }, "-=0.5");
        
        // Services grid animation with ScrollTrigger
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.to('.grid-title', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.services-grid',
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });
            
            gsap.to('.service-card', {
                opacity: 1,
                y: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: '.services-list',
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });
        }
    }
    
    // Initialize animations
    initServicesAnimations();
});
</script>

<?php get_footer(); ?> 