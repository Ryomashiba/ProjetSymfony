<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Incident;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle:Default:index.html.twig');
    }
    public function incident_createAction()
    {


        $virus = new Incident();
        $virus->setDateCreation(date_create());
        $virus->setDescription("je suis un virus");
        $virus->setMachine("PC de merde");
        $virus->setType("virus");
        
        $datacontext = $this->getDoctrine()->getEntityManager();
        $datacontext->persist($virus);
        $datacontext->flush();
        return $this->render('ProjetBundle:Default:index.html.twig');
    }
}
