<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Admin;
use ProjetSymfony\ProjetBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bach\BackofiiceBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Contraints\Datetime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository("ProjetBundle:Machine");
        $utilisateurs = $repo->findAll();
        $response = $this->get('templating')->render('PrjetBundle:Default:index.html.twig', array('utilisateurs'=>$utilisateurs));
        return new Response($response);
    }

    public function  Machine(Request $request){
        if ($request->isMethod('POST')){
            DefaultController::$local = $request->get('yolo');
            $repo = $this->getDoctrine()->getRepository("ProjetBundle:Machine");
            $utilisateurs = $repo->findBy(array('machine> DefaultController::$local));
            $reponse = $this->get('templating')->render('ProjetBundle:Deafault:machine.html.twig', array('utilisateurs'=>$utilisateurs));
            return new Response($response);
        }

        return $this->render('BachBundle:Default:index.html.twig');
    }

}
