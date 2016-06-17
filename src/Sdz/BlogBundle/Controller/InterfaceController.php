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
     $iphone1 =  array(array("id" => 1,
                           "poids" => 15,
                           "prix"  => 20 ));
     
     $iphone2 = array(
                     array("id" => 2,
                           "poids" => 20,
                           "prix"  => 9 ));
    return $this->render('BlogBundle:Interface:layout/presentation.html.twig', array('iphone' => $iphone1,
                                                                                     'iphone2' => $iphone2,
                                                                                     'id '  => $id));
  }
  
  
  public function ajouterAction()
  {
    
             $interface = new Interface1();
         $form    = $this->createForm(new InterfaceType, $interface ); // on crée le formulaire par rapport ProduitType
    $request = $this->get('request'); // on recupere la requete
         if($request->getMethod() == 'POST')// on verifei si c'est une requete post
         {
            $form->bind($request);//On relie la requet et formulaire
            if($form->isValid()) // On verifie que les valeurs entrées sont correct
            {
                $em = $this->getDoctrine()->getManager();// on enregistre les produit
                $em->persist($interface);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'Produit bien ajouté'); // on defini un message flush
                return $this->redirect($this->generateUrl('blog_voirProduit', array('id' => $interface->getId())));
            }
         }
     
    return $this->render('BlogBundle:Interface:layout/ajouter.html.twig', array('form' => $form->createView() ));
  }
}