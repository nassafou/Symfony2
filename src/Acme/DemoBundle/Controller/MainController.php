<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function contactAction()
    {
        
        //return new Response('<h1>Contactez nous!</h1>');
        //return $this->render('DemoBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function helloAction($name)
    {
        return new Response('<html><body>'.$name.'!</body></html>');
    }
}
