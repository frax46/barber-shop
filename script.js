// Remove imports and use global variables from CDN
// import { setupMarqueeAnimation } from "./marquee";
// import gsap from "gsap";
// import { ScrollTrigger } from "gsap/ScrollTrigger";
// import { SplitText } from "gsap/SplitText";
// import Lenis from "lenis";

// Custom SplitText alternative
function customSplitText(element) {
    const text = element.textContent;
    const chars = [];
    
    // Clear the element
    element.innerHTML = '';
    
    // Create character spans
    for (let i = 0; i < text.length; i++) {
        const char = text[i];
        if (char === ' ') {
            // Handle spaces
            const span = document.createElement('div');
            span.classList.add('char');
            span.innerHTML = '<span>&nbsp;</span>';
            span.style.display = 'inline-block';
            element.appendChild(span);
            chars.push(span.querySelector('span'));
        } else {
            // Handle regular characters
            const span = document.createElement('div');
            span.classList.add('char');
            span.innerHTML = `<span>${char}</span>`;
            span.style.display = 'inline-block';
            element.appendChild(span);
            chars.push(span.querySelector('span'));
        }
    }
    
    return { chars: chars };
}

document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM loaded, initializing scripts...");
    
    // Check if required libraries are loaded
    if (typeof gsap === 'undefined') {
        console.error("GSAP not loaded");
        return;
    }
    
    if (typeof Lenis === 'undefined') {
        console.error("Lenis not loaded");
        return;
    }
    
    // Register GSAP plugins
    if (typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        console.log("ScrollTrigger registered");
    }

    // Initialize Lenis smooth scroll with autoRaf
    try {
        const lenis = new Lenis({
            autoRaf: true
        });
        
        console.log("Lenis initialized successfully with autoRaf");
        
        // Connect Lenis with GSAP ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);
        
        console.log("Lenis connected to ScrollTrigger");
        
    } catch (error) {
        console.error("Error initializing Lenis:", error);
    }
    
    // Initialize marquee animation
    if (typeof setupMarqueeAnimation === 'function') {
        setupMarqueeAnimation();
        console.log("Marquee animation initialized");
    } else {
        console.warn("setupMarqueeAnimation function not found");
    }

    // Wait for fonts to load before initializing SplitText
    function initializeAnimations() {
        const cards = gsap.utils.toArray(".card");
        
        if (cards.length === 0) {
            console.warn("No cards found");
            return;
        }
        
        const introCard = cards[0];
        let allTitleChars = []; // For intro card
        let cardTitleChars = {}; // Store chars by card index

        // Initialize Custom SplitText after fonts are loaded
        cards.forEach((card, cardIndex) => {
            const title = card.querySelector(".title h1");
            if (title) {
                console.log(`Processing card ${cardIndex}, title:`, title.textContent);
                const split = customSplitText(title);
                
                // Set initial styles for animation
                const charElements = [];
                split.chars.forEach((char) => {
                    gsap.set(char, {
                        display: "inline-block",
                        x: "100%", // Start position off-screen
                    });
                    charElements.push(char);
                });
                
                // Store characters by card index
                cardTitleChars[cardIndex] = charElements;
                
                // Keep intro card chars in the old variable for compatibility
                if (cardIndex === 0) {
                    allTitleChars = charElements;
                }
            }
        });
        console.log("Custom SplitText initialized successfully");
        console.log("cardTitleChars:", cardTitleChars);

        // Check if required elements exist before proceeding
        const cardImgWrapper = introCard.querySelector(".card-img");
        const cardImg = introCard.querySelector(".card-img img");
        const marquee = introCard.querySelector(".card-marquee .marquee");
        const description = introCard.querySelector(".card-content .description");

        if (!cardImgWrapper || !cardImg) {
            console.warn("Card image elements not found");
            return;
        }

        gsap.set(cardImgWrapper, {scale:0.5, borderRadius: "400px"});
        gsap.set(cardImg, {scale:1.5});

        function animateContentIn(titleChars, description) {
            console.log("Animating content in, titleChars:", titleChars);
            if (titleChars && titleChars.length > 0) {
                // Set initial state for staggered animation
                gsap.set(titleChars, {x: "100%"});
                
                // Animate each character with stagger
                gsap.to(titleChars, {
                    x: "0%", 
                    duration: 0.75, 
                    ease: "power4.out",
                    stagger: 0.02 // Add stagger for letter-by-letter effect
                });
            }
            if (description) {
                gsap.to(description, {x:0, opacity:1, duration:0.75, ease:"power4.out", delay:0.1});
            }
        }
        
        function animateContentOut(titleChars, description) {
            console.log("Animating content out, titleChars:", titleChars);
            if (titleChars && titleChars.length > 0) {
                gsap.to(titleChars, {
                    x: "100%", 
                    duration: 0.5, 
                    ease: "power4.out",
                    stagger: 0.01 // Faster stagger for exit
                });
            }
            if (description) {
                gsap.to(description, {x:"40px", opacity:0, duration:0.5, ease:"power4.out", delay:0.1});
            }
        }

        // Only create ScrollTrigger if elements exist
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.create({
                trigger: introCard,
                start: "top top",
                end: "+=300vh",
                onUpdate: (self) => {
                    const progress = self.progress;
                    const imgScale = 0.5 + progress * 0.5;
                    const borderRadius = 400 - progress * 375;
                    const innerImgScale = 1.5 - progress * 0.5;

                    gsap.set(cardImgWrapper, {scale:imgScale, borderRadius: `${borderRadius}px`});
                    gsap.set(cardImg, {scale:innerImgScale});

                    if (marquee) {
                        if(imgScale >=0.5 && imgScale <= 0.75){
                            const fadeProgress = (imgScale - 0.5) / (0.75 - 0.5);
                            gsap.set(marquee, {opacity:1 - fadeProgress});
                        }else if(imgScale <0.5){
                            gsap.set(marquee, {opacity: 1});
                        }else if(imgScale > 0.75){
                            gsap.set(marquee, {opacity:0});
                        }
                    }

                    if(progress >= 1 && !introCard.contentRevealed){
                        introCard.contentRevealed = true;
                        animateContentIn(allTitleChars, description);
                    }else if(progress < 1 && introCard.contentRevealed){
                        introCard.contentRevealed = false;
                        animateContentOut(allTitleChars, description);
                    }
                }
            });

            cards.forEach((card,index) =>{
                
                const isLastCard = index === cards.length - 1;
                ScrollTrigger.create({
                    trigger:card,
                    start: "top top",
                    end:isLastCard ? "+=100vh":"top top",
                    endTrigger:isLastCard ? null : cards[cards.length - 1],
                    pin:true,
                    pinSpacing:isLastCard,
                    
                })
            });

            cards.forEach((card,index)=>{
                if(index < cards.length - 1){
                    const cardWrapper = card.querySelector(".card-wrapper");
                    ScrollTrigger.create({
                        trigger:cards[index+1],
                        start:"top bottom",
                        end:"top top",
                        onUpdate:(self)=>{
                            const progress = self.progress;
                            gsap.set(cardWrapper,{
                                scale:1-progress*0.25,
                                opacity:1-progress,
                            })
                        }

                    })
                }
            })

            cards.forEach((card,index)=>{
                if(index >0){
                    const cardImg = card.querySelector(".card-img img");
                    const imgContainer = card.querySelector(".card-img");
                    ScrollTrigger.create({
                        trigger:card,
                        start:"top bottom",
                        end:"top top",
                        onUpdate:(self)=>{  
                            const progress = self.progress;
                            gsap.set(cardImg,{scale:2 - progress})
                            gsap.set(imgContainer,{borderRadius:150 - progress*125+"px"})
                        }
                    })
                }
            })

            cards.forEach((card,index)=>{
                if(index === 0) return

                const cardDescription = card.querySelector(".card-content .description");
                const cardChars = cardTitleChars[index]; // Get chars for this specific card
                
                console.log(`Setting up ScrollTrigger for card ${index}, cardChars:`, cardChars);
                
                ScrollTrigger.create({
                    trigger:card,
                    start:"top top",
                    onEnter:()=>animateContentIn(cardChars, cardDescription),
                    onLeaveBack:()=>animateContentOut(cardChars, cardDescription),
                })
            })

            if (typeof setupMarqueeAnimation === 'function') {
                setupMarqueeAnimation();
            }
        }
    }

    function introAnimation(){
        const introParagraphs = document.querySelectorAll(".intro p");
        const introSvg = document.querySelector(".intro svg");
        
        if (introParagraphs.length === 0) {
            console.warn("No intro paragraphs found");
            return;
        }

        // Set initial state for all intro paragraphs
        gsap.set(introParagraphs, {
            x: "-200%",
            opacity: 0
        });

        // Set initial state for SVG
        if (introSvg) {
            gsap.set(introSvg, {
                scale: 0,
                opacity: 0,
                rotation: -180
            });
        }

        // Create timeline for sequential animation
        const tl = gsap.timeline({
            delay: 0.5 // Start animation after page loads
        });

        // Animate each paragraph to jump into place
        introParagraphs.forEach((paragraph, index) => {
            tl.to(paragraph, {
                x: "0%", // Move to center
                opacity: 1,
                duration: 1.2,
                ease: "back.out(1.7)", // Bouncy effect
            }, index * 0.3); // Stagger each paragraph by 0.3 seconds
        });

        // Animate SVG after text is done
        if (introSvg) {
            const textAnimationDuration = introParagraphs.length * 0.3 + 1.2; // Calculate when text finishes
            
            // First animate SVG appearance
            tl.to(introSvg, {
                scale: 1,
                opacity: 1,
                rotation: 0,
                duration: 1.5,
                ease: "elastic.out(1, 0.5)", // Elastic bounce effect
            }, textAnimationDuration + 0.2); // Small delay after text completes
            
            // Then morph the paths to new design
            const morphDelay = textAnimationDuration + 1.7; // After SVG appears
            
            // Target paths for morphing
            const newPaths = {
                path1: "M9.33179 21.663C11.3299 19.8584 11.4868 16.7757 9.68219 14.7776C7.87761 12.7795 4.79492 12.6226 2.79681 14.4272C0.798706 16.2318 0.641825 19.3145 2.44641 21.3126C4.25099 23.3107 7.33368 23.4676 9.33179 21.663Z",
                path2: "M10.93 18.2927L19.8351 18.7459",
                path3: "M37.8925 16.7434L11.0507 21.7317",
                path4: "M3.50145 26.6408C5.72105 28.1648 8.75577 27.6008 10.2797 25.3812C11.8036 23.1616 11.2396 20.1268 9.02002 18.6029C6.80041 17.079 3.76569 17.643 2.24178 19.8626C0.717871 22.0822 1.28184 25.1169 3.50145 26.6408Z",
                path5: "M26.2614 19.0729L38.1961 19.6803"
            };
            
            // Store original paths for morphing back
            const originalPaths = {
                path1: "M9.75 14.625C12.4424 14.625 14.625 12.4424 14.625 9.75C14.625 7.05761 12.4424 4.875 9.75 4.875C7.05761 4.875 4.875 7.05761 4.875 9.75C4.875 12.4424 7.05761 14.625 9.75 14.625Z",
                path2: "M13.195 13.195L19.5 19.5",
                path3: "M32.5 6.5L13.195 25.805",
                path4: "M9.75 34.125C12.4424 34.125 14.625 31.9424 14.625 29.25C14.625 26.5576 12.4424 24.375 9.75 24.375C7.05761 24.375 4.875 26.5576 4.875 29.25C4.875 31.9424 7.05761 34.125 9.75 34.125Z",
                path5: "M24.05 24.05L32.5 32.5"
            };
            
            // Animate each path morphing to new design
            Object.keys(newPaths).forEach((pathId, index) => {
                const pathElement = document.getElementById(pathId);
                if (pathElement) {
                    tl.to(pathElement, {
                        attr: { d: newPaths[pathId] },
                        duration: 2,
                        ease: "power2.inOut",
                        delay: index * 0.1 // Stagger the morphing
                    }, morphDelay);
                }
            });
            
            // Animate back to original design after a pause
            const morphBackDelay = morphDelay + 3; // Wait 3 seconds after forward morph completes
            
            Object.keys(originalPaths).forEach((pathId, index) => {
                const pathElement = document.getElementById(pathId);
                if (pathElement) {
                    tl.to(pathElement, {
                        attr: { d: originalPaths[pathId] },
                        duration: 2,
                        ease: "power2.inOut",
                        delay: index * 0.1 // Stagger the reverse morphing
                    }, morphBackDelay);
                }
            });
        }

        console.log("Intro text and SVG animation initialized");
    }

    // Wait for fonts to load before initializing animations
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(() => {
            console.log("Fonts loaded, initializing animations");
            initializeAnimations();
            introAnimation();
        });
    } else {
        // Fallback for browsers that don't support document.fonts
        setTimeout(() => {
            console.log("Fallback: initializing animations after timeout");
            initializeAnimations();
            introAnimation();
        }, 100);
    }

    // Hamburger Menu Toggle Functionality
    function initializeHamburgerMenu() {
        const toggleBtn = document.getElementById('toggle-btn');
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');
        const menuItems = document.querySelectorAll('.menu-item a');
        
        if (!toggleBtn || !hamburger || !menu) {
            console.warn("Hamburger menu elements not found");
            return;
        }
        
        let isMenuOpen = false;
        
        // Set initial menu state
        gsap.set(menu, {
            x: "100%",
            display: "flex"
        });
        
        // Set initial state for menu items
        gsap.set(menuItems, {
            y: 50,
            opacity: 0
        });
        
        function openMenu() {
            isMenuOpen = true;
            hamburger.classList.add('active');
            toggleBtn.classList.add('active');
            
            // Animate menu in
            gsap.to(menu, {
                x: "0%",
                duration: 0.8,
                ease: "power4.out"
            });
            
            // Animate menu items in with stagger
            gsap.to(menuItems, {
                y: 0,
                opacity: 1,
                duration: 0.6,
                ease: "power3.out",
                stagger: 0.1,
                delay: 0.2
            });
            
            console.log("Menu opened");
        }
        
        function closeMenu() {
            isMenuOpen = false;
            hamburger.classList.remove('active');
            toggleBtn.classList.remove('active');
            
            // Animate menu items out
            gsap.to(menuItems, {
                y: 50,
                opacity: 0,
                duration: 0.4,
                ease: "power3.in",
                stagger: 0.05
            });
            
            // Animate menu out
            gsap.to(menu, {
                x: "100%",
                duration: 0.6,
                ease: "power4.in",
                delay: 0.2
            });
            
            console.log("Menu closed");
        }
        
        // Toggle menu on button click
        toggleBtn.addEventListener('click', () => {
            if (isMenuOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });
        
        // Close menu when clicking on menu items
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                closeMenu();
            });
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMenu();
            }
        });
        
        console.log("Hamburger menu initialized successfully");
    }
    
    // Initialize hamburger menu
    initializeHamburgerMenu();
}); 