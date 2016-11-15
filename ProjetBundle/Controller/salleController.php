<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ProjetSymfony\ProjetBundle\Entity\Salle;


class salleController extends Controller
{
    public function createAction(Request $request)
    {
    
    if($request->isMethod("POST")) {

    	$nom = $request->get("salle");

        $salle = new Salle();
        $salle->setName($nom);
        $salle->setMachines(0);

        $datacontext= $this->getDoctrine()->getEntityManager();
        $datacontext->persist ($salle);
        $datacontext->flush();

        return $this->render("ProjetBundle:Default:index.html.twig");

    }

        else return $this->render('ProjetBundle:Default:salle.html.twig');

    }

}