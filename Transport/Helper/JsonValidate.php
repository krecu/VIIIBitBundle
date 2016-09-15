<?php

namespace VIIIBitBundle\Transport\Helper;

/**
 * Validate json by schema
 *
 * Class JsonDecoder
 * @package VIIIBitBundle\Service\Helper
 */
trait JsonValidate {

    /**
     * Validate json by schema
     *
     * @param $data
     * @return bool
     */
    public static function validate($data)
    {
        $validator = new \JsonSchema\Validator;
        $validator->check($data, (object)['$ref' => 'file://' . realpath(__DIR__ . '/schema.json')]);

        if ($validator->isValid()) {
            return $data;
        } else {
            $errors = "";
            foreach ($validator->getErrors() as $error) {
                $errors .= sprintf("[%s] %s\n", $error['property'], $error['message']);
            }

            return $errors;
        }
    }
}
