document.addEventListener("DOMContentLoaded", () => {
    // Header scroll effect
    const header = document.querySelector(".header")

    function handleScroll() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled")
        } else {
            header.classList.remove("scrolled")
        }
    }

    window.addEventListener("scroll", handleScroll)
    handleScroll() // Check initial scroll position

    // Mobile menu toggle
    const menuToggle = document.querySelector(".header__toggle")
    const body = document.body

    if (menuToggle) {
        menuToggle.addEventListener("click", function () {
            this.classList.toggle("active")
            header.classList.toggle("mobile-menu-open")

            // Prevent body scroll when menu is open
            if (header.classList.contains("mobile-menu-open")) {
                body.style.overflow = "hidden"
            } else {
                body.style.overflow = ""
            }
        })
    }

    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]')

    anchorLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href")

            if (targetId === "#") return

            e.preventDefault()

            const targetElement = document.querySelector(targetId)

            if (targetElement) {
                // Close mobile menu if open
                if (header.classList.contains("mobile-menu-open")) {
                    menuToggle.classList.remove("active")
                    header.classList.remove("mobile-menu-open")
                    body.style.overflow = ""
                }

                // Calculate header height for offset
                const headerHeight = header.offsetHeight

                window.scrollTo({
                    top: targetElement.offsetTop - headerHeight,
                    behavior: "smooth",
                })
            }
        })
    })

    // Reveal animations on scroll
    const revealElements = document.querySelectorAll(".benefit-card, .service-card, .timeline-item")

    function revealOnScroll() {
        const windowHeight = window.innerHeight

        revealElements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top

            if (elementTop < windowHeight - 100) {
                element.classList.add("revealed")
            }
        })
    }

    window.addEventListener("scroll", revealOnScroll)
    revealOnScroll() // Check initial positions

    // Form submission
    const contactForm = document.querySelector(".contact__form form")

    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
            e.preventDefault()

            // Simple form validation
            const formElements = this.elements
            let isValid = true

            for (let i = 0; i < formElements.length; i++) {
                const element = formElements[i]

                if (element.hasAttribute("required") && !element.value.trim()) {
                    isValid = false
                    element.classList.add("error")
                } else {
                    element.classList.remove("error")
                }
            }

            if (!isValid) {
                return
            }

            // Simulate form submission
            const submitButton = this.querySelector('button[type="submit"]')
            const originalText = submitButton.textContent

            submitButton.disabled = true
            submitButton.textContent = "Envoi en cours..."

            setTimeout(() => {
                // Create success message
                const successMessage = document.createElement("div")
                successMessage.className = "form__success"
                successMessage.innerHTML = `
                    <div class="form__success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="form__success-content">
                        <h4>Message envoyé avec succès !</h4>
                        <p>Nous vous contacterons dans les plus brefs délais.</p>
                    </div>
                `

                // Reset form
                contactForm.reset()

                // Show success message
                contactForm.appendChild(successMessage)

                // Reset button
                submitButton.textContent = originalText
                submitButton.disabled = false

                // Remove success message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.add("fade-out")

                    setTimeout(() => {
                        successMessage.remove()
                    }, 500)
                }, 5000)
            }, 1500)
        })
    }

    // Responsive hero height adjustment
    function adjustHeroHeight() {
        const hero = document.querySelector(".hero")
        if (hero) {
            // On mobile, use auto height instead of 100vh to prevent issues with mobile browsers
            if (window.innerWidth < 768) {
                hero.style.height = "auto"
                hero.style.minHeight = "100vh"
            } else {
                hero.style.height = "100vh"
            }
        }
    }

    // Execute on load and resize
    adjustHeroHeight()
    window.addEventListener("resize", adjustHeroHeight)
})

