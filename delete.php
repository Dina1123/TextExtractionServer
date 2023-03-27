
<?php

include "connection.php";
$id = filterRequest("id"); // get the id parameter from POST request
$userData = getAllData("images", "users", "id=?", array($id));

if (!empty($userData)) {
  $imageName =$userData[0]['images']; // get the image name from the fetched data
  $imagePath = './upload/'.$imageName; // create the path to the image
  if (file_exists($imagePath)) {
    // delete the image
    unlink($imagePath);
  }
  
  // delete the user record from the database
  deleteData('users', 'id =?', array($id));
}