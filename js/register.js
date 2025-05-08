document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("registrationForm");
    const emailInput = document.getElementById("email");
    const confirmEmailInput = document.getElementById("confirmEmail");
    const emailError = document.getElementById("emailError");
    const confirmEmailError = document.getElementById("confirmEmailError");

    form.addEventListener("submit", (e) => {
        let isValid = true;

        // Email format validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            emailError.textContent = "Please enter a valid email address.";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Email confirmation match validation
        if (emailInput.value !== confirmEmailInput.value) {
            confirmEmailError.textContent = "Emails do not match.";
            isValid = false;
        } else {
            confirmEmailError.textContent = "";
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            e.preventDefault();
        }
    });
});
