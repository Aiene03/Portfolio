<?php
/**
 * Contact Form Processor
 * Refactored using OOP approach
 */

require_once 'classes/ContactHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $handler = new ContactHandler($_POST);

    if ($handler->process()) {
        $name = $handler->getName();
        echo "<script>
            alert('Thank you, $name! Your message has been sent successfully.');
            window.location.href = 'index.php';
        </script>";
    } else {
        $errors = implode("\\n", $handler->getErrors());
        echo "<script>
            alert('Error:\\n$errors');
            window.history.back();
        </script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
