<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Filters\PromotionFilterInterface;
use App\Service\Serializer\DTOSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
    public function lowestPrice(int $id, PromotionFilterInterface $promotionsFilter , Request $request, DTOSerializer $serializer) : Response
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
        $modifiedEnquiry = $promotionsFilter->apply($lowestPriceEnquiry);
        // 3. Return the modified Enquiry
        $responseContent = $serializer->serialize($modifiedEnquiry, 'json');

        return new Response($responseContent);
    }

}
