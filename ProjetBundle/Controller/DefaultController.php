<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Admin;
use ProjetSymfony\ProjetBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bach\BackofficeBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public static $local;

    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository("ProjetBundle:Salle");
        $utilisateurs = $repo->findAll();
        $response = $this->get('templating')
            ->render('ProjetBundle:Default:index.html.twig', array('utilisateurs'=>$utilisateurs));
        return new Response($response);
    }

    public function ChoixSalleAction(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            DefaultController::$local= $request->get('yolo');
            $repo = $this->getDoctrine()->getRepository("ProjetBundle:Machine");
            $utilisateurs = $repo->findBy(array('salle'=> DefaultController::$local ));
            $response = $this->get('templating')
                ->render('ProjetBundle:Default:salle.html.twig', array('utilisateurs'=>$utilisateurs));
            return new Response($response);
        }
        return $this->render('ProjetBundle:Default:index.html.twig');
    }

}
