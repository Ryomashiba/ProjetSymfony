<?php

namespace ProjetSymfony\ProjetBundle\Controller;

//
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SalleController extends Controller
{
    public function SalleAction()
    {
        $content = $this
        ->get('templating')
        ->render('ProjetBundle:Default:Salle.html.twig', array('machine' => '4' ));

        return new Response($content);
    }
}
