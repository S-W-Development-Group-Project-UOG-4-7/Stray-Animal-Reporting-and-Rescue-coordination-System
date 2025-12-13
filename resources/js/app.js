// Set current year in footer
document.getElementById("current-year").textContent = new Date().getFullYear();

// Mobile menu toggle
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");

if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        mobileMenuBtn.innerHTML = mobileMenu.classList.contains("hidden")
            ? '<i class="fas fa-bars"></i>'
            : '<i class="fas fa-times"></i>';
    });
}

// Back to top button
const backToTopBtn = document.getElementById("back-to-top");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        backToTopBtn.classList.remove("hidden");
    } else {
        backToTopBtn.classList.add("hidden");
    }
});

backToTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

// Form handling
let currentStep = 1;
const totalSteps = 4;
const formProgress = document.getElementById("form-progress");
const steps = document.querySelectorAll(".step-indicator");

// Update progress bar and step indicators
function updateProgress() {
    // Update progress bar width
    const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
    formProgress.style.width = `${progressPercentage}%`;

    // Update step indicators
    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        if (stepNumber < currentStep) {
            step.classList.remove("active");
            step.classList.add("completed");
            step.innerHTML = '<i class="fas fa-check"></i>';
        } else if (stepNumber === currentStep) {
            step.classList.add("active");
            step.classList.remove("completed");
            step.textContent = stepNumber;
        } else {
            step.classList.remove("active", "completed");
            step.textContent = stepNumber;
        }
    });
}

// Show specific step
function showStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll(".form-step").forEach((step) => {
        step.classList.add("hidden");
    });

    // Show requested step
    const stepToShow = document.getElementById(`step-${stepNumber}`);
    if (stepToShow) {
        stepToShow.classList.remove("hidden");
        currentStep = stepNumber;
        updateProgress();

        // If on review step, populate review
        if (stepNumber === 4) {
            populateReview();
        }
    }
}

// Validate current step
function validateStep(stepNumber) {
    let isValid = true;

    if (stepNumber === 1) {
        const animalTypeSelected = document.querySelector(
            'input[name="animal_type"]:checked'
        );
        if (!animalTypeSelected) {
            alert("Please select an animal type");
            isValid = false;
        }
    }

    if (stepNumber === 2) {
        const imageInput = document.getElementById("animal_photo");
        const description = document.getElementById("description").value.trim();

        if (!imageInput.files || imageInput.files.length === 0) {
            document.getElementById("image-error").classList.remove("hidden");
            isValid = false;
        } else {
            document.getElementById("image-error").classList.add("hidden");
        }

        if (!description) {
            document
                .getElementById("description-error")
                .classList.remove("hidden");
            isValid = false;
        } else {
            document
                .getElementById("description-error")
                .classList.add("hidden");
        }
    }

    if (stepNumber === 3) {
        const location = document.getElementById("location").value.trim();
        const lastSeen = document.getElementById("last_seen").value;

        if (!location) {
            document
                .getElementById("location-error")
                .classList.remove("hidden");
            isValid = false;
        } else {
            document.getElementById("location-error").classList.add("hidden");
        }

        if (!lastSeen) {
            document
                .getElementById("last-seen-error")
                .classList.remove("hidden");
            isValid = false;
        } else {
            document.getElementById("last-seen-error").classList.add("hidden");
        }
    }

    if (stepNumber === 4) {
        const termsAccepted = document.getElementById("terms").checked;
        if (!termsAccepted) {
            document.getElementById("terms-error").classList.remove("hidden");
            isValid = false;
        } else {
            document.getElementById("terms-error").classList.add("hidden");
        }
    }

    return isValid;
}

// Populate review step
function populateReview() {
    // Animal type
    const animalType = document.querySelector(
        'input[name="animal_type"]:checked'
    );
    if (animalType) {
        document.getElementById("review-type").textContent = animalType.value;
    }

    // Location
    const location = document.getElementById("location").value;
    document.getElementById("review-location").textContent =
        location || "Not provided";

    // Last seen
    const lastSeen = document.getElementById("last_seen").value;
    if (lastSeen) {
        const date = new Date(lastSeen);
        document.getElementById("review-last-seen").textContent =
            date.toLocaleString();
    } else {
        document.getElementById("review-last-seen").textContent =
            "Not provided";
    }

    // Description
    const description = document.getElementById("description").value;
    document.getElementById("review-description").textContent =
        description || "Not provided";

    // Contact info
    const contactName = document.getElementById("contact_name").value;
    const contactPhone = document.getElementById("contact_phone").value;
    const contactEmail = document.getElementById("contact_email").value;

    if (contactName || contactPhone || contactEmail) {
        let contactDetails = [];
        if (contactName) contactDetails.push(`Name: ${contactName}`);
        if (contactPhone) contactDetails.push(`Phone: ${contactPhone}`);
        if (contactEmail) contactDetails.push(`Email: ${contactEmail}`);

        document.getElementById("review-contact-details").textContent =
            contactDetails.join(", ");
        document.getElementById("review-contact").classList.remove("hidden");
    } else {
        document.getElementById("review-contact").classList.add("hidden");
    }
}

// Next step button handlers
document.querySelectorAll(".next-step").forEach((button) => {
    button.addEventListener("click", function () {
        const nextStep = parseInt(this.getAttribute("data-next"));
        if (validateStep(currentStep)) {
            showStep(nextStep);
        }
    });
});

// Previous step button handlers
document.querySelectorAll(".prev-step").forEach((button) => {
    button.addEventListener("click", function () {
        const prevStep = parseInt(this.getAttribute("data-prev"));
        showStep(prevStep);
    });
});

// File upload handling
const fileUploadArea = document.getElementById("file-upload-area");
const fileInput = document.getElementById("animal_photo");
const filePreview = document.getElementById("file-preview");
const fileName = document.getElementById("file-name");
const fileSize = document.getElementById("file-size");
const imagePreview = document.getElementById("image-preview");
const removeImageBtn = document.getElementById("remove-image");

if (fileUploadArea && fileInput) {
    // Click to upload
    fileUploadArea.addEventListener("click", () => {
        fileInput.click();
    });

    // Drag and drop
    fileUploadArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        fileUploadArea.classList.add("border-cyan-500", "bg-cyan-500/10");
    });

    fileUploadArea.addEventListener("dragleave", () => {
        fileUploadArea.classList.remove("border-cyan-500", "bg-cyan-500/10");
    });

    fileUploadArea.addEventListener("drop", (e) => {
        e.preventDefault();
        fileUploadArea.classList.remove("border-cyan-500", "bg-cyan-500/10");

        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            handleFileSelection(fileInput.files[0]);
        }
    });

    // File input change
    fileInput.addEventListener("change", () => {
        if (fileInput.files.length) {
            handleFileSelection(fileInput.files[0]);
        }
    });

    // Remove image
    removeImageBtn.addEventListener("click", () => {
        fileInput.value = "";
        filePreview.classList.add("hidden");
    });
}

function handleFileSelection(file) {
    if (file && file.type.startsWith("image/")) {
        if (file.size > 5 * 1024 * 1024) {
            alert("File size must be less than 5MB");
            return;
        }

        // Show preview
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);

        // Update file info
        fileName.textContent = file.name;
        fileSize.textContent = `${(file.size / (1024 * 1024)).toFixed(2)} MB`;

        // Show preview
        filePreview.classList.remove("hidden");
        document.getElementById("image-error").classList.add("hidden");
    } else {
        alert("Please select a valid image file (JPG, PNG, etc.)");
    }
}

// Form submission
const reportForm = document.getElementById("animal-report-form");
const successMessage = document.getElementById("success-message");

if (reportForm) {
    reportForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Validate all steps
        let allValid = true;
        for (let i = 1; i <= 4; i++) {
            if (!validateStep(i)) {
                allValid = false;
                showStep(i);
                break;
            }
        }

        if (!allValid) {
            return;
        }

        // Generate report ID
        const reportId =
            "SP-" +
            new Date().getFullYear() +
            "-" +
            Math.floor(10000 + Math.random() * 90000);
        document.getElementById("report-id").textContent = reportId;

        // Show success message
        reportForm.classList.add("hidden");
        successMessage.classList.remove("hidden");

        // In real app, send data to server here
        console.log("Form submitted successfully");
    });
}

// Tracking functionality
const trackBtn = document.getElementById("track-btn");
const trackingStatus = document.getElementById("tracking-status");

if (trackBtn) {
    trackBtn.addEventListener("click", () => {
        const trackingId = document.getElementById("tracking-id").value.trim();

        if (!trackingId) {
            alert("Please enter a report ID");
            return;
        }

        // Show tracking status (demo)
        trackingStatus.classList.remove("hidden");

        // Update tracking info (demo data)
        document.getElementById(
            "report-title"
        ).textContent = `Report #${trackingId}`;

        // Simulate loading
        trackBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin mr-2"></i> Tracking...';
        trackBtn.disabled = true;

        setTimeout(() => {
            trackBtn.innerHTML =
                '<i class="fas fa-search mr-2"></i> Track Report';
            trackBtn.disabled = false;
        }, 1500);
    });
}

// Animated counters
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current);
    }, 20);
}

// Start counters when in viewport
const observerOptions = {
    threshold: 0.5,
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const counters = document.querySelectorAll(".stats-counter");
            counters.forEach((counter) => {
                const target = parseInt(counter.getAttribute("data-count"));
                animateCounter(counter, target);
            });
            observer.disconnect();
        }
    });
}, observerOptions);

const statsSection = document.querySelector("#home");
if (statsSection) {
    observer.observe(statsSection);
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();

        const targetId = this.getAttribute("href");
        if (targetId === "#") return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            // Close mobile menu if open
            if (!mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.add("hidden");
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }

            // Scroll to target
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: "smooth",
            });
        }
    });
});

// Initialize progress bar
updateProgress();

// Add active class to nav links on scroll
const sections = document.querySelectorAll("section[id]");

window.addEventListener("scroll", () => {
    let current = "";
    const scrollPosition = window.scrollY + 100;

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (
            scrollPosition >= sectionTop &&
            scrollPosition < sectionTop + sectionHeight
        ) {
            current = section.getAttribute("id");
        }
    });

    document.querySelectorAll(".nav-link").forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${current}`) {
            link.classList.add("active");
        }
    });
});
