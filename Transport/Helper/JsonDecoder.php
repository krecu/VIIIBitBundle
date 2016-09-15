<?php

namespace VIIIBitBundle\Transport\Helper;

/**
 * Simple json exception checker on decode string
 *
 * Class JsonDecoder
 * @package VIIIBitBundle\Service\Helper
 */
trait JsonDecoder {

    /**
     * Decode string to array
     *
     * @param $content
     * @return string|object
     */
    public static function decode($content)
    {
        if (is_string($content)) {
            try {
                $converted = json_decode($content);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $converted;
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }
}
