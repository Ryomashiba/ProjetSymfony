<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Admin;
use ProjetSymfony\ProjetBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bach\BackofficeBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository("ProjetBundle:Salle");
        $utilisateurs = $repo->findAll();

        $response = $this->get('templating')
            ->render('ProjetBundle:Default:index.html.twig',array('utilisateurs'=>$utilisateurs));
        return new Response($response);
    }

    public function ChoixSalleAction(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $salle = $request->request->get('yolo');
            $repo = $this->getDoctrine()->getRepository("ProjetBundle:Machine");
            $utilisateurs = $repo->findBy(array('salle'=> $salle ));


            $response = $this->get('templating')
                ->render('ProjetBundle:Default:salle.html.twig', array('utilisateurs'=>$utilisateurs));
            return new Response($response);
        }
        return $this->render('ProjetBundle:Default:index.html.twig');
    }

    public function AdminChoixSalleAction(Request $request){

        if ($request->isMethod('POST'))
        {
            $salle = $request->request->get('yolo');
            $this->get('session')->set('salle',$salle);
            $repo = $this->getDoctrine()->getRepository("ProjetBundle:Machine");
            $utilisateurs = $repo->findBy(array('salle'=>$salle));


            $response = $this->get('templating')
                ->render('ProjetBundle:Default:salle.html.twig', array('utilisateurs'=>$utilisateurs));
            return new Response($response);
        }
        return $this->render('ProjetBundle:Default:index.html.twig');
    }

    public function AdminAction(Request $request){


        if ($request->isMethod("POST"))
        {
            $mail = $request->get("mail");
            $password = $request->get("password");

            $repo = $this->getDoctrine()->getRepository("ProjetBundle:Admin");
            $user = $repo->findOneBy(array('mail'=> $mail, 'password'=> $password));

            if ($user == null)
            {
                $repo = $this->getDoctrine()->getRepository("ProjetBundle:Salle");
                $utilisateurs = $repo->findAll();

                $response = $this->get('templating')
                    ->render('ProjetBundle:Default:index.html.twig',array('utilisateurs'=>$utilisateurs));
                return new Response($response);
            }
            else {
                $session = $request->getSession();
                $session->set('mail',$user->getMail());
                $session->set('password', $user->getPassword());
                $repo = $this->getDoctrine()->getRepository("ProjetBundle:Salle");
                $utilisateurs = $repo->findAll();
                $response = $this->get('templating')
                    ->render('ProjetBundle:Default:AdminIndex.html.twig',
                        array('utilisateurs'=>$utilisateurs,'session'=>$session));
                return new Response($response);
            }
        }
        else
            return $this->render('ProjetBundle:Default:index.html.twig');

    }

    public function deconnexionAction(Request $request)
    {
        if ($request->isMethod("POST")) {
            $this->get('session')->clear();
        }
        return $this->redirectToRoute("projet_homepage");
    }

    public function retourAction(Request $request){

        $repo = $this->getDoctrine()->getRepository("ProjetBundle:Salle");
        $utilisateurs = $repo->findAll();

        $response = $this->get('templating')
            ->render('ProjetBundle:Default:AdminIndex.html.twig', array('utilisateurs'=>$utilisateurs));
        return new Response($response);
    }
}
