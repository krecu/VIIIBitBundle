<?php

namespace VIIIBitBundle\Service;

use VIIIBitBundle\Transport\Transport;
use Symfony\Component\DependencyInjection\Container;

/**
 * Class VIIbitService
 * @package VIIIBitBundle\Services
 */
class VIIbitService
{
    /**
     * @var Container $_container
     */
    protected $_container;

    /**
     * @var array
     */
    protected $_params;

    /**
     * VIIbitService constructor.
     * @param Container $container
     * @param array $params
     */
    public function __construct(Container $container, array $params)
    {
        $this->_container = $container;
        $this->_params = $params;
    }

    /**
     * Get step by step item from request
     *
     * @param null $uri
     * @return \Generator
     * @throws \Exception
     */
    public function get($uri = null){
        $uri = empty($uri) ? $this->_params['uri'] : $uri;

        // you make change request method here
        // Transport::$type
        $data = Transport::request($uri);

        if ($data['code'] < 200 || $data['code'] > 299) {
            throw new \Exception("There was an error when requesting with code: " . $data['code'] . "\r\n" . implode("\r\n", $data['messages']));
        }

        foreach ($data['items'] as $item) {
            yield (array)$item;
        }
    }
}
