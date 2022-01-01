<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;

class oracle
{
    function get_oracle_client($endpoint)
    {
        $ORACLE_ACCESS_KEY = env('ORACLE_ACCESS_KEY');
        $ORACLE_SECRET_KEY = env('ORACLE_SECRET_KEY');
        $ORACLE_REGION = env('ORACLE_REGION');
        $ORACLE_NAMESPACE = env('ORACLE_NAMESPACE');

        $endpoint = "https://".$ORACLE_NAMESPACE.".compat.objectstorage.".$ORACLE_REGION.".oraclecloud.com/{$endpoint}";

        return new \Aws\S3\S3Client(array(
            'credentials' => [
                'key' => $ORACLE_ACCESS_KEY,
                'secret' => $ORACLE_SECRET_KEY,
            ],
            'version' => 'latest',
            'region' => $ORACLE_REGION,
            'bucket_endpoint' => true,
            'endpoint' => $endpoint
        ));
    }

    function upload_file_oracle($bucket_name, $folder_name = '', $file_name)
    {
        $ORACLE_PREAUTHENTICATED_REQUEST = env('ORACLE_PREAUTHENTICATED_REQUEST');

        if (empty(trim($bucket_name))) {
            return array('success' => false, 'message' => 'Please provide valid bucket name!');
        }

        if (empty(trim($file_name))) {
            return array('success' => false, 'message' => 'Please provide valid file name!');
        }

        if ($folder_name !== '') {
            $keyname = $folder_name . '/' . $file_name;
            $endpoint =  "{$bucket_name}/";
        } else {
            $keyname = $file_name;
            $endpoint =  "{$bucket_name}/{$keyname}";
        }

    
        $s3 = $this->get_oracle_client($endpoint);
        $s3->getEndpoint();
        
        $file_url = "$ORACLE_PREAUTHENTICATED_REQUEST{$keyname}";
        try {
            $s3->putObject(array(
                'Bucket' => $bucket_name,
                'Key' => $keyname,
                'SourceFile' => $file_name,
                'StorageClass' => 'REDUCED_REDUNDANCY'
            ));

            return array('success' => true, 'message' => $file_url);
        } catch (S3Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    function upload_folder_oracle($bucket_name, $folder_name)
    {
        if (empty(trim($bucket_name))) {
            return array('success' => false, 'message' => 'Please provide valid bucket name!');
        }

        if (empty(trim($folder_name))) {
            return array('success' => false, 'message' => 'Please provide valid folder name!');
        }

        $keyname = $folder_name;
        $endpoint =  "{$bucket_name}/{$keyname}";
        $s3 = $this->get_oracle_client($endpoint);

        try {
            $manager = new \Aws\S3\Transfer($s3, $keyname, 's3://' . $bucket_name . '/' . $keyname);
            $manager->transfer();
            return array('success' => true);
        } catch (S3Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    public function upFileOracle($file_name)
    {
        $bucket_name = env('ORACLE_BUCKET_NAME');
        $folder_name = 'berkas';
        $file_name = str_replace("\\", "/", $file_name);
        $upload = $this->upload_file_oracle($bucket_name,$folder_name,$file_name);
        return $upload;
    }
}


