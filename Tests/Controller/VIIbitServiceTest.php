<?php

namespace VIIIBitBundle\Tests\Controller;

use VIIIBitBundle\Service\VIIbitService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VIIbitServiceTest extends WebTestCase
{

    /** @var  VIIbitService */
    public static $_viibit;
    public static $_params;

    public static function setUpBeforeClass()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        self::$_viibit = $kernel->getContainer()->get('viibit');
        self::$_params = $kernel->getContainer()->getParameter('viibit');
    }

    /**
     * Test bad host
     *
     * @throws \Exception
     */
    public function testBadHostGet()
    {
        $this->assertGreaterThan(
            false,
            self::$_viibit->get("BAD")
        );
    }

    /**
     * Test good request
     *
     * @throws \Exception
     */
    public function testGoodHostGet()
    {
        foreach (self::$_viibit->get(self::$_params['uri']) as $i) {
            $this->assertArrayHasKey(
                'name',
                $i
            );
            break;
        }
    }

}
