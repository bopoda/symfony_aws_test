<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/json", name="json")
     */
    public function jsonAction()
    {
        return new JsonResponse([
            'type' => 'json',
            'key1' => 'test1',
            'key2' => 'test2',
        ]);
    }

    /**
     * @Route("/cats", name="cats")
     */
    public function catsAction()
    {
        return $this->render('default/cats.html.twig');
    }
}
