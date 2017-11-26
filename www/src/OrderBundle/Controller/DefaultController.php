<?php

namespace OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {die('FFII');
        return $this->render('OrderBundle:Default:index.html.twig');
    }
}
