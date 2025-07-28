// Simple form validation & feedback
const form = document.getElementById("contact-form");
const formMessage = document.getElementById("form-message");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Validate fields
  const fname = form.fname.value.trim();
  const lname = form.lname.value.trim();
  const email = form.email.value.trim();
  const message = form.message.value.trim();

  if (fname.length < 2) {
    showMessage("Please enter a valid first name (at least 2 characters).", "error");
    return;
  }
  if (lname.length < 2) {
    showMessage("Please enter a valid last name (at least 2 characters).", "error");
    return;
  }
  if (!validateEmail(email)) {
    showMessage("Please enter a valid email address.", "error");
    return;
  }
  if (message.length < 10) {
    showMessage("Message should be at least 10 characters.", "error");
    return;
  }

  // Simulate sending message
  showMessage("Sending message...", "success");
  setTimeout(() => {
    form.reset();
    showMessage("Thank you! Your message has been sent.", "success");
  }, 1500);
});

function showMessage(msg, type) {
  formMessage.textContent = msg;
  formMessage.className = "form-message " + type;
}

function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email.toLowerCase());
}
