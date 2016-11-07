<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Admin;
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
    public function BaseDeDonneAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Admin');
        $admin = $repository->find(1);



        return $this->render('ProjetBundle:Default:test.html.twig');
    }
    



    public function createAction()
    {
        $u = new Admin();
        $u->setMail("bob@mail.com");
        $u->setPassword("qwerty");
        $u->setName("Bob");

        $datacontext = $this->getDoctrine()->getEntityManager();
        $datacontext->persist($u);
        $datacontext->flush();

        return $this->render('ProjetBundle:Default:index.html.twig');
    }
}
