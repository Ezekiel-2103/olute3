form.addEventListener("submit", async (e) => {
  e.preventDefault();

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

  showMessage("Sending message...", "success");

  // Send data using fetch()
  try {
    const response = await fetch("contact.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        name: `${fname} ${lname}`,
        email: email,
        message: message,
      }),
    });

    const result = await response.text();

    if (result.trim() === "OK" || response.ok) {
      form.reset();
      showMessage("Thank you! Your message has been sent.", "success");
    } else {
      showMessage("There was an error sending your message. Try again later.", "error");
    }
  } catch (error) {
    console.error("Error sending form:", error);
    showMessage("Something went wrong. Please try again.", "error");
  }
});
