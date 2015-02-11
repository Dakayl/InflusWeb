<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Tour;
use Cama\InflusBundle\Form\TourType;

class PostController extends Controller
{
    public function phpbbreceiveAction(Request $request)
    {

	// obtenir respectivement des variables GET et POST
	$rights = $request->request->get('rights', array());
	$infos = $request->request->get('infos', array());
	
	if((count($rights) < 1) || (count($infos) <1)) {
		//Redirection sur erreur
		return $this->redirect($this->generateUrl('error')."?id=1");
	}
	$session = $request->getSession();

	// définit et récupère des attributs de session
	$session->set('rights', $rights);
	$session->set('infos', $infos);
	
	//Passage en session
	return $this->redirect($this->generateUrl('access'));

	return $this->render('CamaInflusBundle:Post:phpbbreceive.html.twig', array(
                // ...
            ));    }
}
