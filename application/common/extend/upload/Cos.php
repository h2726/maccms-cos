<?php
namespace app\common\extend\upload;

use Qcloud\Cos\Client;

class Cos
{
    public $name = '腾讯云对象存储';
    public $ver = '1.0';
    private $config = [];

    public function __construct($config = []) {
        $this->config = $config;
    }

    public function submit($file_path)
    {
        $bucket = $GLOBALS['config']['upload']['api']['cos']['bucket'];
        $region = $GLOBALS['config']['upload']['api']['cos']['region'];
        $secretId = $GLOBALS['config']['upload']['api']['cos']['secretid'];
        $secretKey = $GLOBALS['config']['upload']['api']['cos']['secretkey'];
        $cdn = $GLOBALS['config']['upload']['api']['cos']['cdn'];

        require_once ROOT_PATH . 'extend/cos/vendor/autoload.php';
        
        $cosClient = new Client(
            array(
                'region' => $region,
                'credentials'=> array(
                    'secretId'  => $secretId,
                    'secretKey' => $secretKey
                )
            )
        );
        
        try {
            $filePath = ROOT_PATH . $file_path;
            $key = $file_path;
            $result = $cosClient->putObject(array(
                'Bucket' => $bucket,
                'Key' => $key,
                'Body' => fopen($filePath, 'rb')
            ));
            
            empty($this->config['keep_local']) && @unlink($filePath);
            
            if(!empty($cdn)) {
                return $cdn . '/' . $file_path;
            }
            
            return 'https://' . $bucket . '.cos.' . $region . '.myqcloud.com/' . $file_path;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $file_path;
        }
    }
} 
