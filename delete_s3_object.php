<?php
require('config.php');
    $bucket = 'put-your-source-bucket-name'; //bucket name that contains your files/content
    $folder ='aws-s3-folder-name-inside-your-file-store'; //for example  myfolder/
    
    $keyname = 'file-name'; //for example if your file name is flower.jpg then put this name in the place of keyname(that means the path of flower.jpg file is myfolder/flower.jpg)

$result = $s3->deleteObject([
    'Bucket' => $bucket,
    'Key'    => $folder."/".$keyname
]);
