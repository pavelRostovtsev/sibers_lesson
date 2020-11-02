<?php

namespace AppBundle\Service;


use AppBundle\Entity\Product;

class SerializeProductService
{
    public function serialize(Product $product)
    {
        $arr = [
            'title' => $product->getTitle(),
            'category' => $product->getCategory()->getName(),
            'price' => $product->getPrice(),
        ];

        return $arr;
    }
}