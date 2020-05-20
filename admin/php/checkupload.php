<?php
function Upload($file,$dir){
    $target_file = $dir . basename($_FILES["$file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["$file"]["tmp_name"]);
  if($check !== false) {
//    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
//    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
//if (file_exists($target_file)) {
////  echo "Sorry, file already exists.";
//  $uploadOk = 0;
//}

// Check file size
if ($_FILES["$file"]["size"] > 2000000) {
//  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  return "error";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["$file"]["tmp_name"], $target_file)) {
//    echo "The file ". basename( $_FILES["$file"]["name"]). " has been uploaded.";
  } else {
//    echo "Sorry, there was an error uploading your file.";
  }
}
}    