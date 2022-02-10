<?php
require('config.php');
 if(isset($_FILES['uploaduser'])){
 $files = $_FILES['uploaduser'];
 $name = $files['name'];
 $tmpName = $files['tmp_name'];
 $size = $files['size'];
 $extension = explode('.', $files['name']);
 $extension = strtolower(end($extension));
 $key = md5(uniqid());
 $tmp_file_name = "{$key}.{$extension}";
 $tmp_file_path = "files/{$tmp_file_name}";
 move_uploaded_file($tmpName, $tmp_file_path);
 try{
 $s3->putObject([
 'Bucket' => 'put-your-aws-s3-bucket-name',
 'Key' => "uploads/{$name}",
  ]);
 //remove the file from local folder
 unlink($tmp_file_path);
 } catch (AwsS3ExceptionS3Exception $ex){
 die("Error uploading the file to S3");
 }
 header("Location: index.php");
 exit();
 }
