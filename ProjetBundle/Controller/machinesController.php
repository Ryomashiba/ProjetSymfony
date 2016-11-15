
<?php

namespace ProjetSymfony\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ProjetSymfony\ProjetBundle\Entity\Machine;


class machinesController extends Controller
{
    public function createAction(Request $request)
    {
    
    if($request->isMethod("POST")) {

    	$name = $request->get("machine");
        $ip = $request->get("machine");
        $salle = $request->get("machine");
        $satut = $request->get("machine");

        $machine = new Machine();
        $machine->setIp($ip);
        $machine->setName($name);
        $machine->setSalle($salle);
        $machine->setStatut($statut);

        $datacontext= $this->getDoctrine()->getEntityManager();
        $datacontext->persist ($machine);
        $datacontext->flush();

        return $this->render("ProjetBundle:Default:index.html.twig");

    }

        else return $this->render('ProjetBundle:Default:machine.html.twig');

    }

}