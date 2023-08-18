<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(Request $request, int $id, SerializerInterface $serializer) : Response
    {   


        if ($request->headers->has('force_fail')) {

            return new JsonResponse(
                ['error' => 'Fail message'],
                $request->headers->get('force_fail')
            );
        }

        
        // 1. Deserialize json data into EnquiryDTO
        $lowestPriceEnquiry = $serializer->deserialize($request->getContent(), LowestPriceEnquiry::class, 'json');
        // 2. Pass the Enquiry into promotions filter
        //   -find the appropriate promotion
        // 3. Return the modified Enquiry
        $lowestPriceEnquiry->setDiscountPrice(50);
        $lowestPriceEnquiry->setPrice(100);
        $lowestPriceEnquiry->setPromotionId(3);
        $lowestPriceEnquiry->setPromotionName('Black Friday');
        
        return new JsonResponse($lowestPriceEnquiry);
    }




    #[Route('/products/{id}/promotions', name: 'promotions', methods: 'GET')]
    public function promotions() 
    {
        return new Response('<h1>SUP</h1>');
    }
}
