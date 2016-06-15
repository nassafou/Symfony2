<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sdz\BlogBundle\Entity\Produit;
use Sdz\BlogBundle\Form\ProduitType;

class CatalogueController extends Controller
{
    public function produitsAction()
    {
        $produits = array(
                          
                          array('id'          => 1,
                                'nom'         => 'iphone',
                                'description' => 'Description produit1',
                                'prix'        => '20 euros',
                                'poids'       => '15 kg'),
                          
                          array('id'          => 2,
                                'nom'         => 'iphone',
                                'description' => 'Description produit2 ',
                                'prix'        => '15 euros',
                                'poids'       => '10 kg'),
                          
                          
                          array('id'          => 3,
                                'nom'         => 'iphone',
                                'description' => 'Description produit1',
                                'prix'        => '10 euros',
                                'poids'       => '9 kg')
                          );
        
        return $this->render('BlogBundle:Catalogue:layout/index.html.twig', array('produits' => $produits ));
    }
    
     public function creerAction()
    {
         
         // créer un objet
         //$produit1 = new Produit();
         //$produit1->setNom('Sumsung');
         //$produit1->setDescription('Description produit11');
         //$produit1->setPrix(10);
         //$produit1->setPoids(9);
         
         $produit = new Produit();
         $form    = $this->createForm(new ProduitType, $produit ); // on crée le formulaire par rapport ProduitType
         $request = $this->get('request'); // on recupere la requete
         if($request->getMethod() == 'POST')// on verifei si c'est une requete post
         {
            $form->bind($request);//On relie la requet et formulaire
            if($form->isValid()) // On verifie que les valeurs entrées sont correct
            {
                $em = $this->getDoctrine()->getManager();// on enregistre les produit
                $em->persist($produit);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'Produit bien ajouté'); // on defini un message flush
                return $this->redirect($this->generateUrl('blog_voirProduit', array('id' => $produit->getId())));
            }
         }
        return $this->render('BlogBundle:Catalogue:layout/creer.html.twig', array('form' => $form->createView() ));
    }
    
     public function voirAction()
    {
        return $this->render('BlogBundle:Catalogue:layout/menu.html.twig');
    }
    
    
    
    public function menuAction()
    {
        return $this->render('BlogBundle:Catalogue:layout/menu.html.twig');
    }
    
    
    public function presentationAction($id)
    {
        $produit1 = array(
                          array('id'          => 1,
                                'nom'         => 'iphone',
                                'description' => 'Description produit1',
                                'prix'        => '20 euros',
                                'poids'       => '15 kg')
                          );
        $produit2 = array(
                           array('id'          => 2,
                                'nom'         => 'iphone',
                                'description' => 'Description produit2 ',
                                'prix'        => '15 euros',
                                'poids'       => '10 kg')
                           );
        
        $produit3 = array(
                         array('id'          => 3,
                                'nom'         => 'iphone',
                                'description' => 'Description produit1',
                                'prix'        => '10 euros',
                                'poids'       => '9 kg')
                         );
        return $this->render('BlogBundle:Catalogue:layout/presentation.html.twig', array('produit1' => $produit1,
                                                                                         'id'       => $id,
                                                                                         'produit2' => $produit2,
                                                                                         'produit3' => $produit3
                                                                                         ));
    }
    
     public function categoriesAction($id)
    {
        $categorie1 = array(
                            array('id' => 1, 'nom' => 'tablette'),
                            );
        $categorie2 = array(
                             array('id' => 2,  'nom' => 'telephone')
                            );
        
        return $this->render('BlogBundle:Catalogue:layout/categories.html.twig', array('categorie1' => $categorie1,
                                                                                       'categorie2' => $categorie2,
                                                                                       'id'         => $id ));
    } 
}
