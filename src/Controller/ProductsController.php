<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductsController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(Request $request, int $id) : Response
    {   


        if ($request->headers->has('force_fail')) {

            return new JsonResponse(
                ['error' => 'Fail message'],
                $request->headers->get('force_fail')
            );
        }

        // 1. Deserialize json data into EnquiryDTO
        // 2. Pass the Enquiry into promotions filter
        //   -find the appropriate promotion
        // 3. Return the modified Enquiry
        
        return new JsonResponse([
            'quantity' => 5,
            'request_location' => 'DK',
            'voucher_code' => 'OU812',
            'request_date' => '2023-08-16',
            'product_id' => $id
        ], 200);
    }




    #[Route('/products/{id}/promotions', name: 'promotions', methods: 'GET')]
    public function promotions() 
    {
        return new Response('<h1>SUP</h1>');
    }
}
