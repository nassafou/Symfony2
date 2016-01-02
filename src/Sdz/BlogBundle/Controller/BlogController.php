<?php
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
       // $page = 1;
        $message = 'Blog Symfony 2';
        return $this->render('BlogBundle:Blog:index.html.twig', array('message' => $message) );
    }
    public function ajouterAction()
    {
        
    }
    public function voirAction($id)
    {
        
    }
    public function modifierAction($id)
    {
        
    }
    public function supprimerAction($id)
    {
        
    }
    public function menuAction($nombre)
    {
        //$nombre = 1;
       return $this->render('BlogBundle:Blog:menu.html.twig', array( 'nombre' => $nombre)) ;
    }
}
