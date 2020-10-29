<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $a = 10;
        $array = ['Hi', 12,0, 444];
        $bool_true = true;
        $bool_false = false;
        return $this->render('default/index.html.twig', [
            'a' => $a,
            'array' => $array,
            'bool_true' => $bool_true,
            'bool_false' => $bool_false,
        ]);
    }

    /**
     * @Route("/feedback", name="feedbackAction")
     */
    public function feedbackAction()
    {

        return $this->render('default/feedback.html.twig');
    }

}
