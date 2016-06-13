<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function testAction()
    {
        //die('ici');
        $test = "test ici";
        return $this->render('BlogBundle:Catalogue/layout/index.html.twig', array('text' => $text));
    }
}
