<?php

/**
 * Set the HTML Attribute
 * @param string $fieldName the name of the field to display
 * @return string The HTML entity-encoded output for the form field's `value` attribute.
 */
function fieldValue(string $fieldName): string
{
    // Get the safely-encoded value from POST data
    $fieldValue = getEncodeValue($fieldName);

    // Generate the HTML output
    return " value='$fieldValue'";
}

/**
 * Get a safe value of form field
 * @param string $string The name of the field to display
 * @return string The HTML entity-encoded output for the form field
 */
function getEncodeValue(string $fieldName): string
{
    // Get the value from POST data
    $fieldValue = $_POST[$fieldName] ?? "";

    //if the value empty (return empty string)
    if ($fieldValue == "") return "";

    //Return the encoded value for HTML output
    return htmlspecialchars($fieldValue, ENT_QUOTES, "UTF-8");
}
