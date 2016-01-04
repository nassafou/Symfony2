<?php
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction($page)
    {
        //On ne sait pas combien de page il y a
        // Mais on sait qu'une page doit etre superieure a 1
        if( $page < 1)
        {
            // On declenche une 404
            throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
        }
        
        //ici,on recupere la liste des articles 
       // $page = 1;
        $liste = array(array(
                       'id'=>1,
                       'titre' => 'week-end',
                       'auteur' => 'YOZ',
                       'date' => new \DateTime()),
                       array(
                             'id'=>5,
                             'titre'=> 'petit',
                             'auteur'=> 'YATA',
                             'date'=> new \DateTime()));
        return $this->render('BlogBundle:Blog:index.html.twig', array('articles' => $liste ) );
    }
    public function ajouterAction()
    {
        //La gestion d'un formulaire est particuliere
        
        if( $this->getResquest()->getMethod() == 'POST')
        {
            //ici on s occupera de la creation du formulaire
            $this->get('session')->getFlashBag()->add('notice', 'Article ');
       // puis on redirige vers la page de visualisation de cet article
       return $this->redirect( $this->generateUrl('blog_voir', array('id' => 6)));
       
            
        }
        
       
    
       return $this->render('BlogBundle:Blog:ajouter.html.twig', array('articles' => $article));
    
    }
    public function voirAction($id)
    {
      $articles = array(
        array(
                       'id' => 1,
                       'titre' => 'week-end',
                       'auteur' => 'YOZ',
                       'contenu' => 'bla bla '));    
    
        return $this->render('BlogBundle:Blog:voir.html.twig', array( 'articles' => $articles ));
        
    }
    public function modifierAction($id)
    {
        // on recupere l'article correspondant a l'id
        $article = $this->getRepository('BlogBundle:Entity:Article', array( 'id'=> $id ));
        
        // Ici, on s'occupera de la creation et la gestion du formulaire
        
        // On recupère notre parametre tag
        $tag = $request->query->get('tag');
        
        return $this->render('BlogBundle:Blog:modifier.html.twig', array('articles'=> $this->createView()));
        
    }
    public function supprimerAction($id)
    {
        //ici on recuperera l'article corespondant à l'id
        
        // ici, on gérera la suppression de l'article
        
        return $this->render('BlogBundle:Blog:supprimer.html.twig', array('id' => $id ));
        
    }
    public function menuAction()
    {
        //on fixe en dur une liste ici, normalement recuperable de la BD
        
        $liste = array(
                       array( 'id'=>2, 'titre'=>'Week-end'),
                       array('id' =>5, 'titre'=>'Sortie de symfony2.1'),
                       array('id'=> 6, 'titre'=> 'Petit')
                       );
       return $this->render('BlogBundle:Blog:menu.html.twig', array( 'liste_articles' => $liste )) ;
    }
}
