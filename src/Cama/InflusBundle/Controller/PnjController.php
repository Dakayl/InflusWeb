<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Possesseur;
use Cama\InflusBundle\Form\IAType;
use Cama\InflusBundle\Constants;

class PnjController extends Controller
{

    public function creerAction(Request $request){
	$session = $request->getSession();
	 $rights = $session->get('rights');

        $conte=(!empty($rights[15]));
	if(!$conte){
		return $this->redirect($this->generateUrl('error')."?id=9");		
	}

	$perso = new Possesseur();
        $perso->setVille("Lyon");
        $perso->setIdPhpbb(0);      
        $perso->setBanque(0);
        $perso->setEmail(" ");
	
        $form = $this->createForm(new IAType(), $perso);
        if ($request->getMethod() == 'POST')
        {
                $form->handleRequest($request);
                if ($form->isValid()) {
			
			$perso->setInactif(false);
        	        $perso->setIdPhpbb(0);
			$perso->setEmail(" ");
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($perso);
                        $em->flush();
			return $this->redirect($this->generateUrl('voirPNJ',array('id'=>$perso->getId())));

                }

        }
        return $this->render('CamaInflusBundle:Pnj:creer.html.twig', array(
            	'form' => $form->createView()
        ));

    }
 
    public function editerAction($id, Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');	
	$conte=(!empty($rights[15]));
	if(!$conte){
		return $this->redirect($this->generateUrl('error')."?id=13");		
	}
        
	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
	$perso = $repository->findOneBy(array('id' => $id));
        if (!$perso) {
                return $this->redirect($this->generateUrl('creerPNJ'));
        }
        if(!empty($perso->getIdPhpbb() )){
		return $this->redirect($this->generateUrl('creerPNJ'));		
        }
        $form = $this->createForm(new IAType(), $perso);
        if ($request->getMethod() == 'POST')
        {
                $form->handleRequest($request);
                if ($form->isValid()) {                        
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        return $this->redirect($this->generateUrl('voirPNJ',array("id"=>$id)));
                }

        }
        return $this->render('CamaInflusBundle:Pnj:editer.html.twig', array(
                'form' => $form->createView()
        ));

    }
    
    public function listerAction(Request $request) {
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');
        $infos = $session->get('infos');
	
	$conte=(!empty($rights[15]));
        if(!$conte){
                return $this->redirect($this->generateUrl('error')."?id=14");
        }
                    
        
        $repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
     
        $query = $repository->createQueryBuilder('d')
        ->where('d.idPhpbb = 0')->getQuery();
        
        $persos = $query->getResult();
    
	return $this->render('CamaInflusBundle:Pnj:lister.html.twig', array(
                'persos'=>$persos                
        ));
    }
    
     public function voirAction($id, Request $request){
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

        $conte=(!empty($rights[15]));
	if(!$conte){
		return $this->redirect($this->generateUrl('error')."?id=6");		
	}

        $repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repository->findOneBy(array('id' => $id));

        if (!$perso) {
               return $this->redirect($this->generateUrl('creerPNJ'));
        }
        if(!empty($perso->getIdPhpbb() )){
		return $this->redirect($this->generateUrl('creerPNJ'));		
        }
        else {
                return $this->render('CamaInflusBundle:Pnj:voir.html.twig', array(
		'perso'=>$perso,
		'influences'=>$perso->getInfluence()));
        }
    }
    
    public function supprimerAction($id, Request $request){
       
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

	$conte=(!empty($rights[15]));
	if(!$conte){
		return $this->redirect($this->generateUrl('error')."?id=15");		
	}


	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repository->findOneBy(array('id' => $id, 'idPhpbb'=>0));

        if($perso) {
        	$em = $this->getDoctrine()->getManager();
		$em->remove($perso);
	        $em->flush();
        }
        return $this->redirect($this->generateUrl('listerPNJ'));;

    }
  
}
