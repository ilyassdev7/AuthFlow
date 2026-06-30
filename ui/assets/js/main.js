// =======================
// Elements
// =======================

const password = document.getElementById("password");
const toggle = document.getElementById("togglePassword");
const glow = document.querySelector(".mouse-glow");
const card = document.querySelector(".card");
const loginBtn = document.getElementById("loginBtn");
const toast = document.getElementById("toast");

// =======================
// Toggle Password
// =======================

toggle.addEventListener("click", () => {

    if (password.type === "password") {

        password.type = "text";
        toggle.textContent = "🙈";

    } else {

        password.type = "password";
        toggle.textContent = "👁";

    }

});

// =======================
// Mouse Glow + Card Tilt
// =======================

document.addEventListener("mousemove", (e) => {

    glow.style.left = e.clientX + "px";
    glow.style.top = e.clientY + "px";

    const x = (window.innerWidth / 2 - e.clientX) / 35;
    const y = (window.innerHeight / 2 - e.clientY) / 35;

    card.style.transform =
        `rotateY(${-x}deg) rotateX(${y}deg)`;

});

document.addEventListener("mouseleave", () => {

    card.style.transform = "rotateX(0deg) rotateY(0deg)";

});
// =======================
// Login Validation
// =======================

const form = document.getElementById("loginForm");
const email = document.getElementById("email");

const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

// =======================
// Email Regex
// =======================

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
// =======================
// Password Strength
// =======================

const strengthBar = document.getElementById("strengthBar");
const strengthText = document.getElementById("strengthText");

password.addEventListener("input", () => {

    const value = password.value;

    let strength = 0;

    if (value.length >= 6) strength++;

    if (/[A-Z]/.test(value)) strength++;

    if (/[0-9]/.test(value)) strength++;

    if (/[^A-Za-z0-9]/.test(value)) strength++;

    switch (strength) {

        case 0:

        case 1:

            strengthBar.style.width = "25%";
            strengthBar.style.background = "#ff5f6d";
            strengthText.textContent = "Weak Password";
            break;

        case 2:

            strengthBar.style.width = "50%";
            strengthBar.style.background = "#ffb020";
            strengthText.textContent = "Medium Password";
            break;

        case 3:

            strengthBar.style.width = "75%";
            strengthBar.style.background = "#4F7CFF";
            strengthText.textContent = "Good Password";
            break;

        case 4:

            strengthBar.style.width = "100%";
            strengthBar.style.background = "#28C840";
            strengthText.textContent = "Strong Password";
            break;

    }

    if (value === "") {

        strengthBar.style.width = "0";
        strengthText.textContent = "";

    }

});


form.addEventListener("submit", function (e) {

    let valid = true;

    // Reset

    emailError.textContent = "";
    passwordError.textContent = "";

    email.classList.remove("input-error", "input-success");
    password.classList.remove("input-error", "input-success");







    // Email

    // Email Validation

    if (email.value.trim() === "") {

        emailError.textContent = "Email is required";

        email.classList.add("input-error");

        valid = false;

    } else if (!emailRegex.test(email.value.trim())) {

        emailError.textContent = "Please enter a valid email address";

        email.classList.add("input-error");

        valid = false;

    } else {

        email.classList.add("input-success");

    }

    // Password

    if (password.value.trim() === "") {

        passwordError.textContent = "Password is required";

        password.classList.add("input-error");

        valid = false;

    } else if (password.value.length < 6) {

        passwordError.textContent = "Minimum 6 characters";

        password.classList.add("input-error");

        valid = false;

    } else {

        password.classList.add("input-success");

    }
    if (!valid) {

        e.preventDefault();

    } else {

        loginBtn.disabled = true;

        loginBtn.textContent = "Signing In...";

    }
    });
   