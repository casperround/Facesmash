<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 05/06/2018
 * Time: 22:59
 */

class AdminUtils extends Eloquent
{

    public static function refreshCloudflareData() {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/d28b5841d98f50fdb3d0bbcb500d2f99/analytics/dashboard");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('X-Auth-Email: saruav64@gmail.com'));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-Auth-Key: bfe4b599f92d8197569d2cae0f5943fcdb1b1"));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $result = curl_exec($curl);
        curl_close($curl);

        $decoded = json_decode($result,true);


    }

}