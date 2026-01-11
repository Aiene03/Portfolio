<?php
/**
 * SMTP Configuration
 * Read from environment variables (recommended for Vercel).
 */

define('SMTP_HOST', getenv('SMTP_HOST') ?: 'smtp.gmail.com');
define('SMTP_USER', getenv('SMTP_USER') ?: '');
define('SMTP_PASS', getenv('SMTP_PASS') ?: '');
define('SMTP_PORT', (int)(getenv('SMTP_PORT') ?: 587));
define('SMTP_FROM', getenv('SMTP_FROM') ?: (getenv('SMTP_USER') ?: ''));
define('SMTP_NAME', getenv('SMTP_NAME') ?: 'Portfolio Contact');
?>