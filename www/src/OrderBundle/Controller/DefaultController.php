<?php

namespace OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="order_default")
     */
    public function indexAction()
    {die('ffff');
        return $this->render('OrderBundle:Default:index.html.twig');
    }
}
