<?php

// Default values for main configuration
$sitename = strtolower($_SERVER['SERVER_NAME']);
if (substr($sitename, 0, 4) == 'www.') {
    $sitename = substr($sitename, 4);
}

$options = array(
    'return_path' => '',
    'reply_to' => '',
    'sender_email' => 'newsletter@' . $sitename,
    'sender_name' => get_option('blogname'),
    'editor' => 0,
    'scheduler_max' => 100,
    'phpmailer'=>0,
    'debug'=>0
);
