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
    		$mail = $request->get("mail");
    		$password = $request->get("password");

            $repo= $this->getDoctrine()->getRepository("ProjetBundle:Admin");
    		$admin = $repo->findOneBy(array('mail' => $mail, 'password' => $password));

    		if($admin == null) {
                return $this->render('ProjetBundle:default:index.html.twig');
            }
    		else {
                return $this->render("ProjetBundle:default:admin.html.twig");
            }
    	}
        else {
            return $this->render('ProjetBundle:Default:index.html.twig');
        }
    }


}
