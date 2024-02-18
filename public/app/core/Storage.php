<?php

   namespace MyApp;

   use Aws\S3\S3Client;
   use Aws\S3\Exception\S3Exception;

   require_once './app/../../vendor/autoload.php';

   class Storage {
      private $s3;
      private $bucket = 'vparrot';
      private $region = 'eu-north-1';
      private $apiKey = 'AKIA5FTZCSLVV2QRUWVD';
      private $secret = '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';
      private $s3BaseUrl = 'https://vparrot.s3.eu-north-1.amazonaws.com/';

      public function __construct()
      {
         $this->s3 = new S3Client([
            'version' => 'latest',
            'region' => $this->region,
            'credentials' => [
               'key' => $this->apiKey,
               'secret' => $this->secret,
            ]
         ]);
      }

      public function uploadImage($key, $blob)
      {
         try {            $this->s3->putObject([
               'Bucket' => $this->bucket,
               'Key' => $key,
               'Body' => $blob,
               'ContentType' => 'image/jpeg',
               'ACL' => 'public-read',
            ]);

            return $this->s3BaseUrl . $key;
         } catch (S3Exception $e) {
            echo 'Une erreur est survenue : ' . $e->getMessage();
         }
      }

      public function deleteImage($key_with_base)
      {
         try {
            $key_only = str_replace($this->s3BaseUrl, '', $key_with_base);
            $this->s3->deleteObject([
                  'Bucket' => $this->bucket,
                  'Key'    => $key_only,
            ]);
         } catch (S3Exception $e) {
            echo 'Une erreur est survenue : ' . $e->getMessage();
         }
      }
   }
