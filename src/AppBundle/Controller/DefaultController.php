<?php

namespace AppBundle\Controller;

use AppBundle\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        dump($this->container);
        die;

        return $this->render('@App/default/index.html.twig');
    }

    /**
     * @Route("/feedback", name="feedbackAction")
     */
    public function feedbackAction(Request $request)
    {

        $form = $this->createForm(FeedbackType::class);
        $form->add('submit', SubmitType::class);
        // для отправки данных , просто нужно!

        $form->handleRequest($request);

        // проверка на валидность
        if ($form->isSubmitted() && $form->isValid()) {
            $feedback = $form->getData();

            $em = $this->getDoctrine()->getManager();
//          gir add and git commit
            $em->persist($feedback);
            $em->flush();

            $this->addFlash('succsess', 'Saved');
            return $this->redirectToRoute('feedbackAction');
        }

        return $this->render('@App/default/feedback.html.twig',[
            'feedback_form' => $form->createView()
        ]);
    }

}
