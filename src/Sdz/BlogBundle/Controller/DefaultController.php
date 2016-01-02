<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $text = 'youfslair@hotmail.com, ntyoussouf@gmail.com';
        //On recupere le sevice
        $antispam = $this->container->get('sdz_blog.antispam');
        //Je pars du principe que $text contient le texte d'un message quelconque
        if ($antispam->isSpam($text))
        {
            throw new \Exception('Votre message a été détecté comme spam ');
        }
        return $this->render('BlogBundle:Default:index.html.twig', array('text' => $text));
    }
}
