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
    
    //voir sa fiche PJ courante
    public function voirAction( Request $request)  {
        
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');
        $infos = $session->get('infos');
	$phpbbid = $infos['phpbbid'];
        
        $repository = $this->getDoctrine()
        ->getRepository('CamaInflusBundle:Tour');

	$query = $repository->createQueryBuilder('d')
	->where('d.dateLimite >= :dateNow')
	->orderBy('d.dateLimite', 'ASC')
	->getQuery();
	$now = new \DateTime();
		
        $tours = $query->setParameter('dateNow', $now->format('Y-m-d'))->getResult();
        
        $perso = $repository->findOneBy(array('idPhpbb' => $phpbbid));
        if (!$perso) {
                return $this->render('CamaInflusBundle:Perso:pasfiche.html.twig', array(
                'conte'=>false
                ));
        }
        
        
	 return $this->render('CamaInflusBundle:Fiche:fiche_courante.html.twig', array(
             "perso"=>$perso,
             "tour"=> $tours[0],
             "actions"=>array(),
             "influences"=>array()));
	
    } 
    
    //voir ses anciennes fiches PJ
    public function ancienAction( Request $request) {
	
    } 
    
    //parcourir une ancienne fiches PJ
    public function parcourirAction( Request $request) {
	
    } 
}
