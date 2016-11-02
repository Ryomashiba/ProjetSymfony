<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bach\BackofficeBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle:Default:index.html.twig');
    }
    public function BaseDeDonneAction()
    {
        $mail = "";
        $password = "";
        $name = "";

        $repo = $this->getDoctrine()->getRepository("ProjetBundle:Admin");
        $utilisateur = $repo->findOneBy(array('mail'=> $mail, 'password'=> $password, 'name' =>$name));

        return $this->render('ProjetBundle:Default:index.html.twig');
    }
}
