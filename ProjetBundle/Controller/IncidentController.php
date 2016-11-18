<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use ProjetSymfony\ProjetBundle\Entity\Incident;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IncidentController extends Controller
{
    public function createAction(Request $request)
    {
        $incident = new Incident();
        if($request->isMethod('POST')) {

            $categorie = $request->request->get('theme');
            $description = $request->request->get('description');


            $incident->setType($categorie);
            $incident->setMachine("myMachine");
            $incident->setDescription($description);
            $incident->setDateCreation(date_create());

            $datacontext = $this->getDoctrine()->getEntityManager();
            $datacontext->persist($incident);
            $datacontext->flush();
            return $this->redirectToRoute('projet_homepage');


        }elseif($request->isMethod('GET')) {
            return $this->render('ProjetBundle:incidents:creation.html.twig');
        }else {
            return $this->render('ProjetBundle:Default:error.html.twig');
        }
    }

    public function pingAction(Request $request)
    {
        $ping = 0;
        $ip="192.168.100.25";
        $str = exec("ping -n 1 -w 1 $ip", $input, $result);
        if ($result == 0)
        {
            $ping = 1;
        }
        else
        {
            $ping = 0;
        }
    }
}
