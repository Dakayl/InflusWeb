<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Possesseur;
use Cama\InflusBundle\Form\PossesseurType;
use Cama\InflusBundle\Constants;
use Doctrine\Common\Collections\ArrayCollection;

class FicheController extends Controller
{
    //Liste des fiches à répondre Conteur
    public function listerAction( Request $request) {
        
        
    }  
    
    //Réponse à une fiche Conteur
    public function repondreAction( Request $request) {
        
        
    } 
    
    //Sauvegarde coté joueur de la fiche
    public function sauvegarderAction( Request $request) {
        
        
    } 
    
    
    
    //Edition de la fiche coté joueur
    public function editerAction( Request $request) {
        
	$session = $request->getSession();
        // définit et récupère des attributs de session
        //$rights = $session->get('rights');
        $infos = $session->get('infos');
	$phpbbid = $infos['phpbbid'];
        
        $repositoryJ = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repositoryJ->findOneBy(array('idPhpbb' => $phpbbid));
        
        $repositoryT = $this->getDoctrine()->getRepository('CamaInflusBundle:Tour');

	$query = $repositoryT->createQueryBuilder('d')
	->where('d.dateLimite >= :dateNow')
	->orderBy('d.dateLimite', 'ASC')
	->getQuery();
        
	$now = new \DateTime();		
        $tours = $query->setParameter('dateNow', $now->format('Y-m-d'))->getResult();  
        
        if (!$perso) {
                return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
                'conte'=>false
                ));
        }
        
	return $this->render('CamaInflusBundle:Fiche:fiche_courante.html.twig', array(
             "perso"=>$perso,
             "tour"=> $tours[0],
             "attributs"=>null,
             "contacts"=>null,
             "actions"=>array(),
             "actionlist"=>Constants::$LIST_ACTION,
             "ordreslist"=>Constants::$LIST_ORDRES,
             "list_influ"=>  Constants::$TYPE_INFLUENCE,
             "contact"=>$perso->getContacts(),
             "ordres"=>array(),
             "influences"=>$perso->getInfluence()));
    }  
    
    //voir sa fiche PJ courante
    public function voirAction( Request $request)  {
        
        $session = $request->getSession();
        // définito et récupère des attributs de session
        //$rights = $session->get('rights');
        $infos = $session->get('infos');
	$phpbbid = $infos['phpbbid'];
        
        $repositoryJ = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repositoryJ->findOneBy(array('idPhpbb' => $phpbbid));
        
        $repositoryT = $this->getDoctrine()->getRepository('CamaInflusBundle:Tour');
	$queryT = $repositoryT->createQueryBuilder('d')
	->where('d.dateLimite >= :dateNow')
	->orderBy('d.dateLimite', 'ASC')
	->getQuery();
        $now = new \DateTime();		
        $tours = $queryT->setParameter('dateNow', $now->format('Y-m-d'))->getResult();
        $tourCourant = $tours[0];
        
        $repositoryA = $this->getDoctrine()->getRepository('CamaInflusBundle:Action');
        $queryA = $repositoryA->createQueryBuilder('a')
	->where('a.possesseurid = :pid')
        ->andWhere('a.tourid = :tid')
	->orderBy('a.id', 'ASC')
	->getQuery();        		
        $actions = $queryA->setParameter('pid', $perso->getId())
        ->setParameter('tid', $tourCourant->getId())
        ->getResult();
        
        
        $repositoryC = $this->getDoctrine()->getRepository('CamaInflusBundle:Contact');
        $queryC = $repositoryC->createQueryBuilder('c')
	->where('c.possesseurid = :pid')
        ->andWhere('c.tourid = :tid')
	->orderBy('c.id', 'ASC')
	->getQuery();        		
        $contacts = $queryC->setParameter('pid', $perso->getId())
        ->setParameter('tid',  $tourCourant->getId())
        ->getResult();
        
        $repositoryAt = $this->getDoctrine()->getRepository('CamaInflusBundle:Attribut');
        $queryAt = $repositoryAt->createQueryBuilder('t')
	->where('t.possesseurid = :pid')
        ->andWhere('t.tourid = :tid')
	->orderBy('t.id', 'ASC')
	->getQuery();        		
        $attributes = $queryAt->setParameter('pid', $perso->getId())
        ->setParameter('tid',  $tourCourant->getId())
        ->getResult();
        
        $repositoryO = $this->getDoctrine()->getRepository('CamaInflusBundle:Ordre');
        $queryO = $repositoryO->createQueryBuilder('c')
	->where('o.possesseurid = :pid')
        ->andWhere('o.tourid = :tid')
	->orderBy('o.id', 'ASC')
	->getQuery();        		
        $prdres = $queryO->setParameter('pid', $perso->getId())
        ->setParameter('tid',  $tourCourant->getId())
        ->getResult();
        
        
        if (!$perso) {
                return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
                'conte'=>false
                ));
        }
        
	return $this->render('CamaInflusBundle:Fiche:fiche_view.html.twig', array(
             "perso"=>$perso,
             "tour"=> $$tourCourant,
             "attribut"=>$attributes[0],
             "contacts"=>$contacts,
             "actions"=>$actions,
             "actionlist"=>Constants::$LIST_ACTION,
             "ordreslist"=>Constants::$LIST_ORDRES,
             "list_influ"=>  Constants::$TYPE_INFLUENCE,
             "contact"=>$perso->getContacts(),
             "ordres"=>$prdres,
             "influences"=>$perso->getInfluence()));
	
    } 
    
    //voir ses anciennes fiches PJ  
    public function ancienAction( Request $request) {
	
    } 
    
    //parcourir une ancienne fiches PJ
    public function parcourirAction( Request $request) {
	
    } 
}
