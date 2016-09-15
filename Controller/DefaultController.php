<?php

namespace VIIIBitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    const POINT_COUNT = 100;

    /**
     * Default page with tech description
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('VIIIBitBundle:Default:index.html.twig');
    }

    /**
     * Generate data json file with coordinates
     *
     * @return JsonResponse
     */
    public function jsonOkAction()
    {
        $data = [];

        $data['data'] = [];

        for ($i = 0; $i <= self::POINT_COUNT; $i++) {

            $angle = deg2rad(mt_rand(0, 359));
            $radius = mt_rand(0, 100);

            $data['data']['locations'][] = [
                'name' => 'Moscow',
                'coordinates' => [
                    'lat' => sin($angle) * $radius,
                    'long' => cos($angle) * $radius
                ],
            ];
        }

        $data['success'] = true;

        return new JsonResponse($data);
    }

    /**
     * Generate data json file with error message
     *
     * @return JsonResponse
     */
    public function jsonBadAction()
    {
        $data = [
            'data' => [
                'message' => 'string error message',
                'code' => 'string error code'
            ],
            'success' => false
        ];

        return new JsonResponse($data, 500);
    }
}
