document.getElementById("contactForm").onsubmit = function (event) {
  event.preventDefault(); // Prevent the default form submission

  // Get form values
  const firstName = document.getElementById("firstName");
  const lastName = document.getElementById("lastName");
  const email = document.getElementById("email");
  const contact = document.getElementById("contact");
  const message = document.getElementById("message");

  let valid = true;

  [firstName, lastName, email, contact, message].forEach((f) => {
    f.classList.remove("error", "success");
  });

  if (firstName.value.trim() === "") {
    valid = false;
    firstName.classList.add("error");
  } else {
    firstName.classList.add("success");
  }

  if (lastName.value.trim() === "") {
    valid = false;
    lastName.classList.add("error");
  } else {
    lastName.classList.add("success");
  }

  if (email.value.trim() === "") {
    valid = false;
    email.classList.add("error");
  } else {
    email.classList.add("success");
  }
  if (contact.value.trim() === "") {
    valid = false;
    contact.classList.add("error");
  } else {
    contact.classList.add("success");
  }

  if (message.value.trim() === "") {
    valid = false;
    message.classList.add("error");
  } else {
    message.classList.add("success");
  }
};
