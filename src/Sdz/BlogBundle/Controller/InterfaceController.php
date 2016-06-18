<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Entity\Interface1;
use Sdz\BlogBundle\Form\InterfaceType;

class InterfaceController extends Controller
{
    public function indexAction()
    {
        $phone = array(
                       array('id' => 1,
                             'nom' => 'sumsung',
                             'description' => '1 phone 1',
                             'prix' => '2O euros',
                             'poids' => '15 kg'),
                       
                       array('id' => 2,
                             'nom' => 'nokia',
                             'description' => '2 phone 2',
                             'prix' => '1O euros',
                             'poids' => '9 kg'),
                       );
        return $this->render('BlogBundle:Interface:layout/index.html.twig', array('phone' => $phone )); 
    }
    
  public function presentationAction($id)
  {
    $iphone1 =  array(array("id" => 1,"poids" => 15,"prix"  => 20 ));
    $iphone2 = array(array("id" => 2, "poids" => 20,"prix"  => 9 ));
    return $this->render('BlogBundle:Interface:layout/presentation.html.twig', array('iphone' => $iphone1,
                                                                                     'iphone2' => $iphone2,
                                                                                     'id '  => $id));
  }
  
  public function ajouterAction()
  {
    $interface = new Interface1(); // on crée un objet article
    $formBuilder = $this->createFormBuilder($interface);//On crée le FormBuilder grâce à la methode du controleur
    $formBuilder// On ajout les champs de l'entité que l'on veut à notre formulaire
      ->add('nom', 'text')
      ->add('description', 'textarea')
      ->add('prix', 'integer')
      ->add('poids', 'integer');
      
      $form = $formBuilder->getForm();// A partir du formBuilder, on génere le formulaire
      
    return $this->render('BlogBundle:Interface:layout/ajouter.html.twig', array('form' => $form->createView() ));// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
  }
  
  public function bootAction()
  {
     $test = "here";
    
     return $this->render('BlogBundle:Interface:layout/boot.html.twig', array('test' => $test )); 
  }
}