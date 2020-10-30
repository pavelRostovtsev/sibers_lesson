<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="products_list")
     */
    public function indexAction(Request $request)
    {
        $products = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

        return $this->render('@App/product/index.html.twig',[
            'products' => $products,
        ]);
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "[0-9]+"})
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }

        return $this->render('@App/product/show.html.twig',[
            'product' => $product
        ]);
    }

}
