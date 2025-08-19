// Toggle Button Script
const toggleBtn = document.getElementById("authToggle");

// Detect current page
const currentPage = window.location.pathname.split("/").pop();

if (currentPage === "login.html") {
  toggleBtn.textContent = "SignUp";
  toggleBtn.onclick = () => {
    window.location.href = "signup.html";
  };
} else if (currentPage === "signup.html") {
  toggleBtn.textContent = "SignIn";
  toggleBtn.onclick = () => {
    window.location.href = "signin.html";
  };
} else {
  // Default (on homepage or others)
  toggleBtn.textContent = "SignUp";
  toggleBtn.onclick = () => {
    window.location.href = "signup.html";
  };
}

window.addEventListener("DOMContentLoaded", () => {
  // Responsive navbar toggle
  const toggleBtn = document.getElementById("toggleBtn");
  const navLinks = document.querySelector(".nav-links");
  if (toggleBtn && navLinks) {
    toggleBtn.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
    // Close nav on link click (mobile UX)
    navLinks.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        navLinks.classList.remove("active");
      });
    });
    // Close nav on close button click
    const closeNavBtn = document.getElementById("closeNavBtn");
    if (closeNavBtn) {
      closeNavBtn.addEventListener("click", () => {
        navLinks.classList.remove("active");
      });
    }
  }
});

