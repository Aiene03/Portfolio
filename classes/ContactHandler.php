<?php
/**
 * ContactHandler Class
 * Handles contact form validation and processing using OOP
 */

require_once __DIR__ . '/../config.php';

// Manually include PHPMailer if vendor doesn't exist (Manual Installation)
if (file_exists(__DIR__ . '/../includes/PHPMailer/src/PHPMailer.php')) {
    require __DIR__ . '/../includes/PHPMailer/src/Exception.php';
    require __DIR__ . '/../includes/PHPMailer/src/PHPMailer.php';
    require __DIR__ . '/../includes/PHPMailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactHandler {
    private $data;
    private $errors = [];

    public function __construct($postData) {
        $this->data = $postData;
    }

    /**
     * Sanitize and validate the input data
     */
    public function validate() {
        $name = $this->sanitize($this->data['name'] ?? '');
        $email = filter_var($this->data['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $subject = $this->sanitize($this->data['subject'] ?? '');
        $message = $this->sanitize($this->data['message'] ?? '');

        if (empty($name)) $this->errors[] = "Name is required.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $this->errors[] = "Valid email is required.";
        if (empty($subject)) $this->errors[] = "Subject is required.";
        if (empty($message)) $this->errors[] = "Message is required.";

        return empty($this->errors);
    }

    /**
     * Process the form (send email via PHPMailer and log submission)
     */
    public function process() {
        if (!$this->validate()) {
            return false;
        }

        $name = $this->sanitize($this->data['name']);
        $email = filter_var($this->data['email'], FILTER_SANITIZE_EMAIL);
        $subjectText = $this->sanitize($this->data['subject']);
        $messageBody = $this->sanitize($this->data['message']);

        // Log locally first as a backup
        $this->logSubmission($name, $email, $subjectText, $messageBody);

        // Attempt to send via PHPMailer
        if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host       = SMTP_HOST;
                $mail->SMTPAuth   = true;
                $mail->Username   = SMTP_USER;
                $mail->Password   = SMTP_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = SMTP_PORT;

                // Recipients
                $mail->setFrom(SMTP_FROM, SMTP_NAME);
                $mail->addAddress(SMTP_USER); // Receive to your own email
                $mail->addReplyTo($email, $name);

                // Content
                $mail->isHTML(false);
                $mail->Subject = "Portfolio Contact: " . $subjectText;
                $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$messageBody";

                $mail->send();
                return true;
            } catch (Exception $e) {
                // If PHPMailer fails, we fall back to the log which already happened
                return true;
            }
        }

        // Final fallback: Use native mail if PHPMailer isn't found
        $to = SMTP_USER;
        $subject = "Portfolio Contact: " . $subjectText;
        $headers = "From: " . SMTP_FROM . "\r\n" . "Reply-To: $email";
        @mail($to, $subject, $mail->Body, $headers);

        return true;
    }

    /**
     * Log the submission to a file for persistent record
     */
    private function logSubmission($name, $email, $subject, $message) {
        $logDir = __DIR__ . "/../logs";
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logFile = $logDir . "/contacts.txt";
        $timestamp = date("Y-m-d H:i:s");
        $logEntry = "[$timestamp] NAME: $name | EMAIL: $email | SUBJECT: $subject\nMESSAGE: $message\n" . str_repeat("-", 50) . "\n";

        file_put_contents($logFile, $logEntry, FILE_APPEND);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getName() {
        return $this->sanitize($this->data['name'] ?? 'User');
    }

    private function sanitize($value) {
        return htmlspecialchars(strip_tags(trim($value)));
    }
}
?>
