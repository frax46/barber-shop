<?php
/**
 * Template Name: About Page
 * The template for displaying the About page
 *
 * @package Nicos
 */

get_header();
?>

<section class="about-hero">
    <!-- Background masked text -->
    <div class="background-masked-text">
        <div class="masked-text-overlay">
            <h2 class="brand-text" data-text="NICOS">NICOS</h2>
            <p class="brand-subtitle">BARBER</p>
        </div>
    </div>
    
    <!-- Main content overlay with glass effect -->
    <div class="about-container">
        <div class="about-content-card">
            <div class="about-text">
                <h1 class="about-title"><?php echo esc_html(get_hero_field('about_title', ' styling')); ?></h1>
                <p class="about-description">
                    <?php echo esc_html(get_hero_field('about_description', 'Master barber with over 15 years of experience, bringing traditional craftsmanship to modern styling.')); ?>
                </p>
                <div class="about-details">
                    <div class="detail-item">
                        <span class="detail-number">15+</span>
                        <span class="detail-label">Years Experience</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-number">1000+</span>
                        <span class="detail-label">Happy Clients</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-number">5★</span>
                        <span class="detail-label">Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-story">
    <div class="story-container">
        <h2 class="story-title">My Story</h2>
        <div class="story-content">
            <p class="story-text">
                <?php echo esc_html(get_hero_field('about_story', 'Started as an apprentice in the heart of the city, I learned the art of barbering from the masters of the trade. Every cut tells a story, every shave is a ritual, and every client leaves feeling like their best self.')); ?>
            </p>
        </div>
    </div>
</section>

<style>
.about-hero {
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

.about-container {
    position: relative;
    z-index: 2;
    max-width: 600px;
    width: 100%;
}

/* Glass effect card for main content */
.about-content-card {
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

.about-text {
    text-align: center;
}

.about-title {
    font-size: 3rem;
    font-weight: 600;
    margin-bottom: 1em;
    background: linear-gradient(45deg, #fff, #ccc);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.about-description {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 2em;
    opacity: 0.9;
    text-align: center;
}

.about-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2em;
    margin-top: 2em;
    align-items: center;
    justify-items: center;
}

.detail-item {
    text-align: center;
    opacity: 0;
    transform: translateY(30px);
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.detail-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    line-height: 1;
}

.detail-label {
    display: block;
    font-size: 0.9rem;
    opacity: 0.7;
    margin-top: 0.5em;
    white-space: nowrap;
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
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-2.jpg') center/cover;
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
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-2.jpg') center/cover;
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
    background: url('<?php echo get_template_directory_uri(); ?>/images/barber-2.jpg') center/cover;
    background-attachment: fixed;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent;
}

.about-story {
    padding: 6em 2em;
    background: #0f0f0f;
    color: white;
}

.story-container {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.story-title {
    font-size: 3rem;
    font-weight: 600;
    margin-bottom: 2em;
    opacity: 0;
    transform: translateY(50px);
}

.story-text {
    font-size: 1.125rem;
    line-height: 1.8;
    opacity: 0;
    transform: translateY(30px);
}

@media (max-width: 768px) {
    .about-container {
        max-width: 90%;
    }
    
    .about-content-card {
        padding: 2em;
        border-radius: 20px;
    }
    
    .about-title {
        font-size: 2.5rem;
    }
    
    .about-details {
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
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // About page animations
    function initAboutAnimations() {
        const tl = gsap.timeline();
        
        // Animate background masked text first
        tl.to('.background-masked-text', {
            opacity: 1,
            duration: 1.5,
            ease: "power2.out"
        })
        
        // Animate the glass content card
        .to('.about-content-card', {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out"
        }, "-=0.8")
        
        // Animate detail items
        .to('.detail-item', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        }, "-=0.5");
        
        // Story section animation with ScrollTrigger
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.to('.story-title', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: '.about-story',
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });
            
            gsap.to('.story-text', {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out",
                delay: 0.3,
                scrollTrigger: {
                    trigger: '.about-story',
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });
        }
    }
    
    // Initialize animations
    initAboutAnimations();
});
</script>

<?php get_footer(); ?> 