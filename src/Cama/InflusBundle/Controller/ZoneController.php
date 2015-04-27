<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Possesseur;
use Cama\InflusBundle\Form\PossesseurType;
use Cama\InflusBundle\Constants;
use Doctrine\Common\Collections\ArrayCollection;

class ZoneController extends Controller
{
    public function getDataAction(Request $request){
        $action =  $request->query->get('action', null);
        $index = $request->query->get('index', 1);
        
        $infos = $session->get('infos');
        $phpbbid = $infos['phpbbid'];
        
        $repositoryJ = $this->getDoctrine()->getRepository('CamaInflusBundle:Possesseur');
        $perso = $repositoryJ->findOneBy(array('idPhpbb' => $phpbbid));
        
        $refuge_list = array();
        $refuges = $perso->getRefuge();
        foreach($refuges as $r){
            $refuge_list[] = $r->getNom();
        }
        
        $servant_list = array();
        $servants = $perso->getServant();
        foreach($servants as $s){
            $servant_list[] = $s->getNom();
        }
         
        if(isset(Constants::$LIST_ACTION[$action])){
            $parameters = Constants::$LIST_ACTION[$action]['parameters'];
            return $this->render('CamaInflusBundle:Fiche:action_complete.html.twig', array(
                "parameters"=>$parameters,
                "index"=>$index,
                "list_learn_mentor"=>  Constants::list_learn_mentor(),
                "list_learn_nomentor"=>  Constants::list_learn_nomentor(),
                "list_ville"=>  Constants::$list_ville,
                "list_refuge"=> $refuge_list,
                "list_historique"=>  Constants::$list_historique,
                "list_serv"=> $servant_list,
                "list_influ"=>  Constants::$TYPE_INFLUENCE
                    
                )
            );
        }
        else {
            return $this->redirect($this->generateUrl('error')."?id=".$action);
        }
        
    }
}

