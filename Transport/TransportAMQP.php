<?php

namespace VIIIBitBundle\Transport;

use VIIIBitBundle\Transport\Helper\JsonDecoder;
use VIIIBitBundle\Transport\Helper\JsonValidate;

/**
 * Class TransportCURL
 * @package VIIIBitBundle\Transport
 */
class TransportAMQP extends Transport {
    
    /**
     * Execute AMPQ request
     *
     * @param $uri
     * @return array
     */
    public static function request($uri){
        // @todo - need implements
    }
}