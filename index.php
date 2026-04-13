<?php

// Config
$title = "Coming Soon";

// Start output buffering (trap the output instead of displaying it)
ob_start();

// Include the page-specific template/content
include_once "templates/_indexPage.html.php";

// Stop output buffering (store output in $content variable)
$content = ob_get_clean();

// Include the main layout template (with custom $content)
include_once "templates/_layout.html.php";
