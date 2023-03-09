<?php

// Decryption of string process starts
// Used random_bytes() which gives randomly
// 16 digit values
$decryption_iv = random_bytes($iv_length);

// Store the decryption key
$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);

// Descrypt the string
$decryption = openssl_decrypt(
    $encryption,
    $ciphering,
    $decryption_key,
    $options,
    $encryption_iv
);

// Display the decrypted string

echo "<br> Decrypted String: " . $decryption;
?>