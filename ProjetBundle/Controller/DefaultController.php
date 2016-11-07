<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
    	if($request->isMethod("POST")) {
    		$email = $request->request->get('mail');
    		$password = $request->request->get('password');
    		$repo= $this->getDoctrine()->getRepository("ProjetBundle:Utilisateur");
    		$admin = $repo->findOneBy(array('mail' => $mail, 'password' => $password));

    		if($admin == null)
    			return $this->render('ProjetBundle_default:index.html.twig');
    		else
    			return $this->redirectToRoute('ProjetBundle_default:index.html.twig');
    	}
    	else
    		 return $this->render('ProjetBundle:Default:index.html.twig');
    }
}
