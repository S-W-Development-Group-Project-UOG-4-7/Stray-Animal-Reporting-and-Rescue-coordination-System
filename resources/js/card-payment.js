// Updated Card Payment Processing - Secure Implementation
// This file should be included in the donation.blade.php

function processCardDonation() {
    const cardNumber = document.getElementById("cardNumber");
    const expiryDate = document.getElementById("expiryDate");
    const cvc = document.getElementById("cvc");
    const cardName = document.getElementById("cardName");
    const donorName = document.getElementById("donorName");
    const donorEmail = document.getElementById("donorEmail");
    const donorPhone = document.getElementById("donorPhone");

    const submitBtn = document.getElementById("donateCardBtn");
    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Processing Payment...';
    submitBtn.disabled = true;

    // Prepare card donation data
    const cardDonationData = {
        card_number: cardNumber.value.replace(/\s/g, ""),
        card_expiry: expiryDate.value,
        card_cvc: cvc.value,
        card_name: cardName.value,
        donor_name: donorName.value || "Anonymous",
        donor_email: donorEmail.value,
        donor_phone: donorPhone.value,
        amount: selectedCardAmount,
        message: document.getElementById("donorMessage")?.value || "",
    };

    // Send to secure backend endpoint
    fetch("/donation/card", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(cardDonationData),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Show success message
                showSuccessModal(
                    "Donation Submitted!",
                    `Thank you for your donation of $${selectedCardAmount.toFixed(2)}! Your payment is being processed.`,
                );

                // Clear form
                cardNumber.value = "";
                expiryDate.value = "";
                cvc.value = "";
                cardName.value = "";
                clearCardSelection();

                // Redirect after 2 seconds
                setTimeout(() => {
                    window.location.href = data.redirect_url;
                }, 2000);
            } else {
                showErrorModal(
                    "Payment Error",
                    data.message || "Failed to process payment",
                );
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            showErrorModal(
                "Error",
                "Network error occurred. Please try again.",
            );
        })
        .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
}

// Modal display functions
function showSuccessModal(title, message) {
    const modal = document.getElementById("result-modal");
    const icon = document.getElementById("result-icon");
    const titleEl = document.getElementById("result-title");
    const msgEl = document.getElementById("result-message");

    icon.innerHTML = '<i class="text-2xl text-white fas fa-check"></i>';
    icon.className =
        "w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600";
    titleEl.textContent = title;
    titleEl.className = "text-2xl font-bold text-center mb-4 text-green-400";
    msgEl.textContent = message;

    modal.classList.remove("hidden");
}

function showErrorModal(title, message) {
    const modal = document.getElementById("result-modal");
    const icon = document.getElementById("result-icon");
    const titleEl = document.getElementById("result-title");
    const msgEl = document.getElementById("result-message");

    icon.innerHTML = '<i class="text-2xl text-white fas fa-times"></i>';
    icon.className =
        "w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600";
    titleEl.textContent = title;
    titleEl.className = "text-2xl font-bold text-center mb-4 text-red-400";
    msgEl.textContent = message;

    modal.classList.remove("hidden");
}
