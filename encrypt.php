<?php
  // The plain text password to be hashed
  $plaintext_password = "admin";
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;
?>