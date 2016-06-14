<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
                                'poids'       => '9 kg'),
                          
                          );
        return $this->render('BlogBundle:Catalogue:layout/index.html.twig', array('produits' => $produits,
                                                                                  ));
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
    
    
     public function categoriesAction()
    {
        $categories = array(
                            array('id' => 1, 'nom' => 'tablette'),
                            array('id' => 2,  'nom' => 'telephone')
                            
                            );
        
        return $this->render('BlogBundle:Catalogue:layout/categories.html.twig', array('categorie' => $categories ));
    }
    
}
