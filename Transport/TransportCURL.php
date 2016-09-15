<?php

namespace VIIIBitBundle\Transport;

use VIIIBitBundle\Transport\Helper\JsonDecoder;
use VIIIBitBundle\Transport\Helper\JsonValidate;

/**
 * Class TransportCURL
 * @package VIIIBitBundle\Transport
 */
class TransportCURL extends Transport {
    
    use JsonDecoder, JsonValidate;

    /**
     * Execute CURL request
     *
     * @param $uri
     * @return array
     */
    public static function request($uri){

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FAILONERROR => 1,
            CURLOPT_USERAGENT => 'VIIIBit test query'
        ));

        $res = curl_exec($curl);
        $error = [];
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($res || ($code >= 200 && $code <= 299)) {

            // decode string to object
            $response = static::decode($res);
            if (is_string($response)) {
                $error[] = $response;
                goto error;
            }

            // validate items by schema (это не очень то и хорошо - но полезно, далее просто будет проще)
            $response = static::validate($response);
            if (is_string($response)) {
                $error[] = $response;
                goto error;
            }

            // validate 'success' field
            if (!$response->success) {
                $error[] = $response->data->message;
                $code = $response->data->code;
                goto error;
            }

            $data = [
                'items' => $response->data->locations,
                'code' => $code,
            ];
        }

        // if CURL error or goto to error
        else {

            $error[] = curl_error($curl);

            error:

            $data = [
                'messages' => $error,
                'code' => $code,
            ];
        }

        curl_close($curl);

        return $data;
    }
}