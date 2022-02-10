<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new S3Client([
        'profile' => 'default',
        'version' => 'latest',
        'region' => 'us-east-2',
        //Below I provided hard coded credentials(not recomended), see best practice for providing credentials to your application https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials_hardcoded.html
        'credentials' => [
            'key'    => 'put-your-access-key-id',
            'secret' => 'put-your-secret-access-key',
            ],
        ]);
        
    $result = $s3Client->listObjects([
        'Bucket' => 'put-your-created-bucket-name',
        'Key' => 'key'
    ]);

?>
