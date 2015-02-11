<?php

namespace Cama\InflusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Cama\InflusBundle\Entity\Tour;
use Cama\InflusBundle\Form\TourType;

class TourController extends Controller
{

    public function creerTourAction(Request $request){
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

        $admin=(!empty($rights[5])||!empty($rights[15])||!empty($rights[16]));

        if(!$admin) {
		 return $this->redirect($this->generateUrl('error')."?id=3");
        }
	
	setlocale(LC_TIME, "fr_FR");
	$date = new \DateTime("last sat of this month");
	$dateSub = new \DateTime("last sat of this month");

	$dateSub->sub(new \DateInterval('P11D'));
	 // crée une tâche et lui donne quelques données par défaut pour cet exemple
        $tour = new Tour();
	$formatted_time = strftime("%B %Y", $date->getTimestamp());
	$formatted_time = utf8_encode($formatted_time);
        $tour->setMois($formatted_time);
	$tour->setDateLimite($dateSub);
	$tour->setDatePartie($date);
	$tour->setActions(3);

	$form = $this->createForm(new TourType(), $tour);
	if ($request->getMethod() == 'POST')
	{
		 $form->handleRequest($request);

         	if ($form->isValid()) {
                	$em = $this->getDoctrine()->getManager();
	                $em->persist($tour);
			$em->flush();
                       return $this->redirect($this->generateUrl('listerTour')."?created=".$tour->getId());
                }

	}
        return $this->render('CamaInflusBundle:Tour:creer.html.twig', array(
            'form' => $form->createView(),
        ));
    }	
 
    public function editerTourAction($id, Request $request){
        $session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

        $admin=(!empty($rights[5])||!empty($rights[15])||!empty($rights[16]));

        if(!$admin) {
		 return $this->redirect($this->generateUrl('error')."?id=4");
        }
	
	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Tour');
        $tour = $repository->findOneBy(array('id' => $id));

	$form = $this->createForm(new TourType(), $tour);
	if ($request->getMethod() == 'POST')
        {
                 $form->handleRequest($request);

                if ($form->isValid()) {
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
			$tour = $form->getData();
                       return $this->redirect($this->generateUrl('listerTour')."?updated=".$tour->getId());
                }

        }
        return $this->render('CamaInflusBundle:Tour:editer.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function supprimerTourAction($id, Request $request){
       
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

	$admin=(!empty($rights[5])||!empty($rights[15])||!empty($rights[16]));

	if(!$admin) {
		 return $this->redirect($this->generateUrl('error')."?id=5");
	}

	$repository = $this->getDoctrine()->getRepository('CamaInflusBundle:Tour');
        $tour = $repository->findOneBy(array('id' => $id));

        $em = $this->getDoctrine()->getManager();
	$idT = $tour->getId();
	$em->remove($tour);
        $em->flush();
        return $this->redirect($this->generateUrl('listerTour')."?deleted=".$idT);

    }

    public function listeToursAction(Request $request)
    {
	$session = $request->getSession();
        // définit et récupère des attributs de session
        $rights = $session->get('rights');

	$repository = $this->getDoctrine()
        ->getRepository('CamaInflusBundle:Tour');

	$query = $repository->createQueryBuilder('d')
	->where('d.dateLimite >= :dateNow')
	->orderBy('d.dateLimite', 'ASC')
	->getQuery();
	$now = new \DateTime();
		
        $tours = $query->setParameter('dateNow', $now->format('Y-m-d'))->getResult();

        return $this->render('CamaInflusBundle:Tour:lister.html.twig', array(
                "admin"=>(!empty($rights[5])||!empty($rights[15])||!empty($rights[16])),
		"tours"=>$tours
            ));    }

    public function ancienTourAction(Request $request)
    {
        $repository = $this->getDoctrine()
        ->getRepository('CamaInflusBundle:Tour');

        $query = $repository->createQueryBuilder('d')
        ->where('d.dateLimite < :dateNow')
        ->orderBy('d.dateLimite', 'ASC')
        ->getQuery();
        $now = new \DateTime();

        $tours = $query->setParameter('dateNow', $now->format('Y-m-d'))->getResult();

        return $this->render('CamaInflusBundle:Tour:ancien.html.twig', array(
                "tours"=>$tours
            ));    }

}
