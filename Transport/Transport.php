<?php

namespace VIIIBitBundle\Transport;

/**
 * Class TransportInterface
 * @package VIIIBitBundle\Transport
 */
abstract class Transport implements TransportInterface {

    /**
     * Default transport protocol
     *
     * @var string
     */
    public static $type = 'CURL';

    /**
     * Execute request
     *
     * @param $uri
     * @return mixed
     */
    public static function request($uri){

        $class = Transport::class . static::$type;
        if (class_exists($class)) {
            return $class::request($uri);
        }
    }
}