<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Possesseur;
use Cama\InflusBundle\Form\PossesseurType;
use Cama\InflusBundle\Constants;

class PersoController extends Controller
{

    public function voirMonPersoAction( Request $request) 
    {
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');
        $infos = $session->get('infos');
	$phpbbid = $infos['phpbbid'];
	
	$conte=(!empty($rights[15]));
        if($conte ||empty($phpbbid)){
                return $this->redirect($this->generateUrl('error')."?id=7");
        }

	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repository->findOneBy(array('idPhpbb' => $phpbbid));
	if (!$perso) {
		return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
		'conte'=>false
        	));
	}
	else {
		return $this->render('CamaInflusBundle:Perso:voir.html.twig', array(
                'conte'=>false,
		'perso'=>$perso,
		'influences'=>$perso->getInfluence(),
		'refuges'=>$perso->getRefuge(),
		'vehicules'=>$perso->getVehicule(),
		'servants'=>$perso->getServant(), 
		'etiquettes'=>$perso->getEtiquette()));
        }

    }
    
    public function voirPersoAction($id, Request $request){
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
                return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
		'conte'=> true
                ));
        }
        else {
                return $this->render('CamaInflusBundle:Perso:voir.html.twig', array(
                 'conte'=>true,
		 'perso'=>$perso,
		'influences'=>$perso->getInfluence(),
		'refuges'=>$perso->getRefuge(),
		'vehicules'=>$perso->getVehicule(),
		'servants'=>$perso->getServant(), 
		'etiquettes'=>$perso->getEtiquette()));
        }
    }
   
    public function creerPersoAction(Request $request){
	$session = $request->getSession();
	$infos = $session->get('infos');
        
	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
	$phpbbid = $infos['phpbbid'];
	$clan = ucfirst($infos['clan']);
	$email = $infos['email'];
	$perso = $repository->findOneBy(array('idPhpbb' => $phpbbid));
        if ($perso || empty($phpbbid)) {
	        return $this->redirect($this->generateUrl('voirMonPerso'));
	}
	$infos = $session->get('infos');

	$perso = new Possesseur();
        $perso->setVille("Lyon");
        $perso->setAllies(0);
        $perso->setContacts(0);
        $perso->setRessources(0);
        $perso->setBanque(0);
        $perso->setClan($clan);
        $perso->setEmail($email);
	
        $form = $this->createForm(new PossesseurType(), $perso);
        if ($request->getMethod() == 'POST')
        {
                $form->handleRequest($request);
                if ($form->isValid()) {
			$perso->setNom($infos['name']);
			$perso->setInactif(true);
        	        $perso->setIdPhpbb($phpbbid);
			$perso->setClan($clan);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($perso);
                        $em->flush();
			return $this->redirect($this->generateUrl('voirMonPerso'));

                }

        }
        return $this->render('CamaInflusBundle:Perso:creer.html.twig', array(
            	'form' => $form->createView(),
		'name'=>$infos['name'],
                'clan'=>$clan
        ));

    }	
 
    public function editerPersoAction($id, Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');	
	$conte=(!empty($rights[15]));
	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
	$perso = $repository->findOneBy(array('id' => $id));
        if (!$perso) {
                return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
                'conte'=>false
                ));
        }
        $form = $this->createForm(new PossesseurType(), $perso);
        if ($request->getMethod() == 'POST')
        {
                $form->handleRequest($request);
                if ($form->isValid()) {
                        if(!$conte) $perso->setInactif(true);
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        if(!$conte) return $this->redirect($this->generateUrl('voirMonPerso'));
                        return $this->redirect($this->generateUrl('voirPerso',array("id"=>$id)));
                }

        }
        return $this->render('CamaInflusBundle:Perso:editer.html.twig', array(
                'form' => $form->createView(),
                'name'=>$perso->getNom(),
                'clan'=>$perso->getClan()
        ));

    }

    public function validerPersoAction($id, Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');	
	$conte=(!empty($rights[15]));
        
        $repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
	$perso = $repository->findOneBy(array('id' => $id));
        if($perso && $conte) {
            $perso->setInactif(false);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('listeAValiderPerso'));
    }

    public function devaliderPersoAction($id, Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');	
	$conte=(!empty($rights[15]));
        
        $repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
	$perso = $repository->findOneBy(array('id' => $id));
        if($perso && $conte) {
            $perso->setInactif(true);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('listeAValiderPerso'));
    }

    public function listeAValiderPersoAction(Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');
        $infos = $session->get('infos');
	$phpbbid = $infos['phpbbid'];
	
	$conte=(!empty($rights[15]));
        if(!$conte){
                return $this->redirect($this->generateUrl('error')."?id=8");
        }
        $array = array('inactif' => true,"ph");
               
        
        $repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
     
        $q = $repository->createQueryBuilder('d')
	->where('d.inactif = true')
        ->andWhere('d.idPhpbb != 0')
	->orderBy('d.', 'ASC');
        $clan='';
        if(!empty($request->query->get('clan'))) {
          
            $clan = $request->query->get('clan');
            $q->andWhere('d.clan = :clan');
        }
        $query = $q->getQuery();
        if(!empty($request->query->get('clan'))) {
             $query->setParameter('clan', $clan);
        }
      	
        $persos = $query->getResult();
    
	return $this->render('CamaInflusBundle:Perso:avalider.html.twig', array(
                'persos'=>$persos,
                'clan'=>$clan,
                'conte'=>$conte,
                'clans'=>  Constants::$LIST_CLANS
                
        ));
        
        
    }
   
    public function listerPersoAction(Request $request) {
        
    }
  
}
