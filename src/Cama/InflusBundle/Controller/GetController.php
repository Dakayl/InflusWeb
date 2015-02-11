<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class GetController extends Controller
{
    public function accessAction(Request $request) 
    {
        
	$session = $request->getSession();
	// définit et récupère des attributs de session
	$rights = $session->get('rights');
	$infos = $session->get('infos');
	
	if(!is_array($rights) || (count($rights) < 1) || !is_array($infos) || (count($infos) < 1)) {
		return $this->redirect($this->generateUrl('error')."?id=2");
        }

	return $this->render('CamaInflusBundle:Get:access.html.twig', array(
                "username"=>ucwords($infos["name"]),
		"admin"=>(!empty($rights[5])||!empty($rights[15])||!empty($rights[16])),
		"conte"=>(!empty($rights[15])), 
		"joueur"=>(!empty($rights[9])),
            ));    }

    public function errorAction(Request $request)
    {
        return $this->render('CamaInflusBundle:Get:error.html.twig', array(
                "id"=>$request->query->get('id')
            ));   }

    public function ordresActuelsAction()
    {
        return $this->render('CamaInflusBundle:Get:ordresActuels.html.twig', array(
                // ...
            ));    }

    public function ordresPrecedentsAction()
    {
        return $this->render('CamaInflusBundle:Get:ordresPrecedents.html.twig', array(
                // ...
            ));    }

    public function editerPersonnageAction()
    {
        return $this->render('CamaInflusBundle:Get:editerPersonnage.html.twig', array(
                // ...
            ));    }

}
