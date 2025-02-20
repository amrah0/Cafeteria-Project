<?php

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../core/functions.php';
use core\Database;
use core\Validator;

try {
    $categoryName = $_POST['category_name'] ?? '';

    // Validate category name
    // makesure is a string && Not Empty && ignore only these character
    if (is_string($categoryName) && !empty(trim($categoryName)) && preg_match('/^[a-zA-Z\s]+$/', $categoryName)) {
        $data = ['name' => trim($categoryName)];

        // Insert data into the
        // access Database Class And make a New Object Of It
        $db = new Database();

        $insert = $db->insert('category', $data);

        if ($insert) {
            redirect("/Cafeteria-Project/views/admin/categories/create.view.php?success=true");
            exit;
        } else {
            $errors = ['database' => "Failed to insert category into the database."];
        }
    } else {

        // Handle validation errors
        $errors = [];
        $old = [];
        $errors = ['category_name' => "Category name must contain only letters and spaces."];

        if (!$categoryName) {
            $errors['category_name'] = "Please enter a category name";
        } else {
            $old['category_name'] = $categoryName;
        }

        // Encode errors and old data properly
        //urlencode for spaces in the string
        $errors = urlencode(json_encode($errors));
        $old = urlencode(json_encode($old));

        // Redirect with error and old values
        // redirect is a custom function stored in core/functions
        redirect(" /Cafeteria-Project/views/admin/categories/create.view.php?error={$errors}&old={$old}");
        exit;
    }
} catch (Exception $e) {
    echo  $e->getMessage();
}

?>
