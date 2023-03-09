<?php
  // Plaintext password entered by the user 
  $unencrypted_password = "Cloudways@123"; 
  
  // The hashed password can be retrieved from database 
//   $hash ="2y10D6pwJsA5KKdUs7tlrIC3z.we7QZR58wx9gEiuLlQ/dr7E/Rtnj9Ce";

  $hash = password_hash($unencrypted_password, PASSWORD_DEFAULT); 
  
  // Verify the hash code against the unencrypted password entered 
  $verify = password_verify($unencrypted_password, $hash); 
  
  // Print the result depending if they match 
  if ($verify) {
       echo 'Correct Password!'; 
       }
 
  else { 
      echo 'Password is Incorrect';
       } 
?>