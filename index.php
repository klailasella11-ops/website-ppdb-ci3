<?php
define('ENVIRONMENT', 'development'); // ← langsung development biar error keliatan

// Path ke folder system dan application
$system_path = 'system';
$application_folder = 'application';

// Jangan diubah di bawah ini
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE) {
    $system_path = $_temp.DIRECTORY_SEPARATOR;
} else {
    $system_path = rtrim($system_path, '/\\').DIRECTORY_SEPARATOR;
}

if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly.';
    exit(3);
}

define('SELF',        pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH',    $system_path);
define('FCPATH',      dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SYSPATH',     $system_path);
define('APPPATH',     $application_folder.DIRECTORY_SEPARATOR);
define('VIEWPATH',    APPPATH.'views'.DIRECTORY_SEPARATOR);

require_once BASEPATH.'core/CodeIgniter.php';