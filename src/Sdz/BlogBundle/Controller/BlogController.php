<?php
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sdz\BlogBundle\Entity\Article;
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
         // creation de l'entité
         $article = new Article();
         $article->setTitre('Mon dernier Week-end');
         $article->setAuteur('YOZ');
         $article->setContenu("C'était vraiment super"); 
         
         // on ne peut pas définir ni la date ni  la publication car ils sont définis dans le constructeur
         
         //On recupere l'entity manager
         $em = $this->getDoctrine()->getManager();
         
         //Etape 1 on persiste l'entité
         $em->persist($article);
         // Etape 2 on flush l' entité
         $em->flush();
        //La gestion d'un formulaire est particuliere
        
        if( $this->getRequest()->getMethod() == 'POST')
        {
            //ici on s occupera de la creation du formulaire
            $this->get('session')->getFlashBag()->add('info', 'Article  bien enregistré');
       // puis on redirige vers la page de visualisation de cet article
       return $this->redirect( $this->generateUrl('blog_voir', array('id' => $article->getId())));
       }
        
       return $this->render('BlogBundle:Blog:ajouter.html.twig');
    
    }
    public function voirAction($id)
    {
      // on crée l'entité
      
      $em = $this->getDoctrine()->getManager();
      // crée le repository
      $repository = $em->getRepository('BlogBundle:Article');
                         
      //on recupere                  
      $article = $repository->find($id);
      // $article est donc une instance de Sdz\BlogBundle\Entity\Article
      
      // Ou null si aucun article n'a été trouvé avec l'id $id
      
      if( $article === null )
      {
        throw $this->createNotFoundException('Article[id='.$id.'] inexistant');
      }
    
        return $this->render('BlogBundle:Blog:voir.html.twig', array( 'article' => $article ));
        
    }
    public function modifierAction($id)
    {
        // on recupere l'article correspondant a l'id
       // $article = $this->getRepository('BlogBundle:Entity:Article', array( 'id'=> $id ));
        
        // Ici, on s'occupera de la creation et la gestion du formulaire
        
        // On recupère notre parametre tag
        //$tag = $request->query->get('tag');
        
        $articles = array(
        
                       'id' => 1,
                       'titre' => 'week-end',
                       'auteur' => 'YOZ',
                       'contenu' => 'bla bla',
                       'date' => new \DateTime());
        
        return $this->render('BlogBundle:Blog:modifier.html.twig', array('articles'=> $articles,
                                                                         'id' => $id));
        
    }
    public function supprimerAction($id)
    {
        //ici on recuperera l'article corespondant à l'id
        
        // ici, on gérera la suppression de l'article
        
        return $this->render('BlogBundle:Blog:supprimer.html.twig', array('id' => $id ));
        
    }
    public function menuAction($nombre) // Ici, nouvel argument $nombre, on l'a transmis via le render() depuis la vue  
    {
        //on fixe en dur une liste ici, normalement recuperable de la BD
        // On pourra récuperer $nombre articles depuis la BD
        // avec $nombre un parametre qu'on peut changer lorsqu'on appelle cette action 
        
        $liste = array(
                       array( 'id'=>2, 'titre'=>'Week-end'),
                       array('id' =>5, 'titre'=>'Sortie de symfony2.1'),
                       array('id'=> 6, 'titre'=> 'Petit')
                       );
       return $this->render('BlogBundle:Blog:menu.html.twig', array( 'liste_articles' => $liste,
                                                                    'nombres' => $nombre)) ;
    }
}
