<?php

//Configuration
$title = "Get Ready";

//Start Output Buffering, trap output instead of displaying it
ob_start();

//Adding all errors records for the submission (empty by default) :Array
$errors = [];

//The condition when submitting the button
if (isset($_POST["submitContact"])) {

    //Making varibale and Getting values from the form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $message = $_POST["message"];

    // validation first Name
    if ($firstName === "") {
        $errors["firstName"] = "First name is required";
    } else if (strlen($firstName) < 2) {
        $errors["firstName"] = "First name must be 2+ characters";
    }

    //validation for last name
    if ($lastName === "") {
        $errors["lastName"] = "Last name is required";
    } else if (strlen($lastName) < 2) {
        $errors["lastName"] = "Last name must be 2+ characters";
    }

    //validation for email
    if ($email === "") {
        $errors["email"] = " Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email email pattern";
    }

    //validation for contact
    if ($contact === "") {
        $errors["contact"] = "Contact Number is required";
    }

    //validation for message
    if ($message === "") {
        $errors["message"] = "Message is required";
    }

    //condition if errors found
    if (count($errors) > 0) {

        //Include specific content to show the index page with errors
        include_once "templates/_indexPage.html.php";
    } else {
        //Include specific content to show the confirmation page
        include_once "templates/_confirmationPage.html.php";
    }
} else {
    //Include specific content to show the index page
    include_once "templates/_indexPage.html.php";
}


//stop output buffering (store output in $content variable)
$content = ob_get_clean();


//Include the main lyout for the website (with variable $contenct)
include_once "templates/_layout.html.php";
