<?php

include "connection.php";


if (isset($_FILES['images'])) {
  $images = imageUpload('images');
} else {
 return;
}

if (isset($_POST['texts'])) {
  $texts = $_POST['texts'];
} else {
  $texts = '';
}

$data = array(
  'images' => $images,
  'texts' => $texts
);

$inserted_rows = insertData('users', $data);

if ($inserted_rows > 0) {
  echo json_encode(array('status' => 'success'));
} else {
  echo json_encode(array('status' => 'failure'));
}
