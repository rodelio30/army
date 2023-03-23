<?php
  // Plaintext password entered by the user
  // $plaintext_password = "Password@123";
  $plaintext_password = "admin";
  
  // The hashed password retrieved from database
  $hash = "$2y$10$4zw93ZAsDahFU8YohvuTdOOKeOoUXUFoviJc1x0i3wASgS0am8mpi";
  
  // Verify the hash against the password entered
  $verify = password_verify($plaintext_password, $hash);
  
  // Print the result depending if they match
  if ($verify) {
      echo '<br>Password Verified!';
  } else {
      echo '<br>Incorrect Password!';
  }
?>