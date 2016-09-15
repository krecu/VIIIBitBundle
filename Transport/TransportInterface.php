<?php

namespace VIIIBitBundle\Transport;

/**
 * Interface TransportInterface
 *
 * Если нам вдруг понадобиться выполнять запросы не по HTTP или
 * же другими инструментами, например не CURL то наследуемся и творим
 * свои темные делишки
 *
 * @package VIIIBitBundle\Transport
 */
interface TransportInterface {

    /**
     * Execute request
     *
     * @param $uri
     * @return mixed
     */
    public static function request($uri);
}