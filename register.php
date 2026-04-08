<?php

  // Common includes for main PHP pages (controllers)
  require_once "includes/common.php";

  // Config
  $title = "Register";

  // Start output buffering (trap the output instead of displaying it)
  ob_start();

  // Collection of all errors for this submission (empty by default)
  $errors = [];

  // Check if form has been submitted
  if (isset($_POST['submitRegister'])) {

    // Form has been submitted - process data

    // TESTING - manually add errors
    // $errors["firstName"] = "First name is required";
    // $errors["lastName"] = "Last name is required";

    // Get form data ($_POST superglobal array)
    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    $email = $_POST["email"] ?? "";
    $password1 = $_POST["password1"] ?? "";
    $password2 = $_POST["password2"] ?? "";
    $course = $_POST["course"] ?? "";
    $enrolmentMode = $_POST["enrolmentMode"] ?? "";
    $comments = $_POST["comments"] ?? "";
    $newsletterChecked = isset($_POST["newsletter"]);
    $termsChecked = isset($_POST["terms"]);

    // TODO: Normalise/sanitise data
    $firstName = trim($firstName);

    // Validate fields...

    // Validate first name
    if ($firstName === "") {
      $errors["firstName"] = "First name is required";
    } else if (strlen($firstName) < 2) {
      $errors["firstName"] = "First name must be 2+ characters";
    }

    // Validate last name
    if ($lastName === "") {
      $errors["lastName"] = "Last name is required";
    } else if (strlen($lastName) < 2 || strlen($lastName) > 50) {
      $errors["lastName"] = "Last name must be 2-50 characters";
    }

    // Validate email
    if ($email === "") {
      $errors["email"] = "Email is required";
    }
    // Email pattern match
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Invalid email pattern";
    }

    // Validate passwords
    if (strlen($password1) < 10) {
      $errors["password1"] = "Password must be 10+ characters";
    } else if ($password2 !== $password1) {
      $errors["password2"] = "Passwords don't match";
    }


    // Check for errors (invalid data)
    if (count($errors) > 0) {

      // Invalid - re-display form with errors
      include_once "templates/_registerPage.html.php";

    } else {

      // Valid - display confirmation (save to DB, send email, etc...)

      // Send email (via Resend)
      try {

        // Encode values safely for output in HTML (email content and confirmation page)
        $firstName = esc($firstName);
        $lastName = esc($lastName);
        $email = esc($email);
        $course = esc($course);
        $comments = esc($comments);

        // Define other email data
        $htmlEnrolmentMode = $enrolmentMode === "ft" ? "Full-time" : "Part-time";
        $htmlNewsletter = $newsletterChecked ? "Yes" : "No";
        
        // Try to send an email via Resend's API
        $resend = Resend::client(RESEND_API_KEY);
        $resend->emails->send([
          'from' => 'Northwind Website <website@hornsbytafe.com>',
          'to' => ['michael.kirkwood-smith3@tafensw.edu.au'],
          'subject' => 'Northwind Website Registration Submission',
          'html' => <<<HTML
          <h1>Northwind Website registration form submission</h1>
          <p>Registration form submitted...</p>
          <ul>
            <li>First Name: $firstName</li>
            <li>Last Name: $lastName</li>
            <li>Email: $email</li>
            <li>Course: $course</li>
            <li>Enrolment Mode: $htmlEnrolmentMode</li>
            <li>Newsletter: $htmlNewsletter</li>
            <li>Comments: $comments</li>
          </ul>
          HTML,
        ]);

        // Email was sent successfully!

        // Display confirmation page
        include_once "templates/_registerConfirmation.html.php";

        // OPTIONAL: Redirect to another page
        // Remember the exit with the "Location" header!
        // If you want to pass data to the redirected page, use a query string (?firstName=Mike) or the $_SESSION array
        // header("Location: someConfirmationPage.php");
        // exit;

      } catch (Exception $e) {
        
        // Error - email was NOT sent

        // Invalid - re-display form with errors
        $errors["resend"] = "Email could not be sent: " . $e->getMessage();
        include_once "templates/_registerPage.html.php";

      }
    }

  } else {
    
    // Just display the form
    include_once "templates/_registerPage.html.php";

  }

  // Stop output buffering (store output in $content variable)
  $content = ob_get_clean();

  // Include the main layout template (with custom $content)
  include_once "templates/_layout.html.php";