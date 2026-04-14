<?php
//Include helper functions for form handling
include_once "includes/formHelpers.php";

?>



<form action="index.php" id="contactForm" method="post">
    <div class="content">
        <img
            src="images/sports-warehouse-logo-600.png"
            alt="Sport Warehouse Logo"
            class="image" />
        <h2>Where Passion Meets Performance Your Game Starts Here</h2>

        <p>
            Sports warehouse is coming soon. If you have any questions, we would
            love to hear from you, please complete the following information.
        </p>

        <!-- Error Messages -->
        <?php if (!empty($errors)) : ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        <!-- end of Error Messages -->

        <div class="column">
            <div class="form-group">
                <input
                    type="text"
                    name="firstName"
                    id="firstName"
                    placeholder=""
                    <?= fieldValue("firstName") ?> />
                <label for="firstName">First Name</label>


            </div>

            <div class="form-group">
                <input type="text" name="lastName" id="lastName" placeholder="" <?= fieldValue("lastName") ?> />
                <label for="lastName">Last Name</label>
                <small class="validation"></small>
            </div>
        </div>

        <div class="column">
            <div class="form-group">
                <input type="text" name="contact" id="contact" placeholder="" <?= fieldValue("contact") ?> />
                <label for="contact">Contact Number</label>
                <small class="validation"></small>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="email"
                    id="email"
                    placeholder=" "
                    <?= fieldValue("email") ?> />
                <label for="email">Email</label>
                <small class="validation"></small>
            </div>

        </div>

        <div class="form-group">
            <textarea
                name="message"

                id="message"
                rows="5"
                cols="30"
                placeholder=" "><?= getEncodeValue("message") ?></textarea>
            <label for="message" class="label">Enter your message </label>
            <small class="validation"></small>
        </div>

        <button type="submit" class="submit-btn" name="submitContact">Submit</button>


    </div>



    </div>
</form>