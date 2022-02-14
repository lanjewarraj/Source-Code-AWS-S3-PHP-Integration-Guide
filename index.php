<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
        'profile' => 'default',
        'version' => 'latest',
        'region' => 'put-your-aws-s3-region/endpoint', //see the complete region/enfpoint list :-> https://docs.aws.amazon.com/general/latest/gr/s3.html
        //Below I provided hard coded credentials(not recomended), see best practice for providing credentials to your application https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials_hardcoded.html
        'credentials' => [
            'key'    => 'put-your-aws-access-key-id',
            'secret' => 'put-your-aws-secret-access-key',
            ],
        ]);
        
    $result = $s3Client->listObjects([
        'Bucket' => 'put-your-aws-s3-bucket-name',
        'Key' => 'key'
    ]);

?>
<!-- 1. UPLOAD A FILE TO S3 BUCKET -->
 <html>
 <head>
 <title>Upload Data</title>
 <script type="text/javascript" src="js/jquery.js"></script>
 </head>
 <body>
 <h3>Upload the files</h3>
    <form name="upload" action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaduser" id="uploaduser" />
        <input type="submit" name="submit" value="upload"/>
    </form>
 


<!-- 2. LIST FILES FROM S3 BUCKET -->
<table border="1px">
<thead>
    <tr>
        <th>File name</th>
    </tr>
</thead>
<tr>
<?php foreach ($result['Contents'] as $object): ?>
 <tr>
 <td><?php echo $object['Key']; ?></td>
 </tr>
 <?php endforeach; ?>
</table>


<!-- 3. Download content of bucket -->

<table border="1px">
<thead>
    <tr>
        <th>File name</th>
    </tr>
</thead>
<tr>
<?php foreach ($result['Contents'] as $object): ?>
 <tr>
    <td><a href="<?php echo $s3->getObjectUrl('put-your-aws-s3-bucket-name', $object['Key']); ?>" download="<?php echo $object['Key']; ?>">Download</a></td>
 </tr>
 <?php endforeach; ?>
</table>

</body>
</html>


<!-- 4. Delete content of AWS S3 bucket refer delete_s3_object.php -->
