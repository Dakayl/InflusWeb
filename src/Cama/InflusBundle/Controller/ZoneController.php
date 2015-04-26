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
        
        if(isset(Constants::$LIST_ACTION[$action])){
            $parameters = Constants::$LIST_ACTION[$action]['parameters'];
            return $this->render('CamaInflusBundle:Fiche:action_complete.html.twig', array(
                "parameters"=>$parameters,
                "index"=>$index
                )
            );
        }
        else {
            return $this->redirect($this->generateUrl('error')."?id=".$action);
        }
        
    }
}

