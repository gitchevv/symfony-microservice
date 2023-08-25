<?php

namespace App\Filters;

use App\Entity\Promotion;
use App\DTO\PromotionEnquiryInterface;


class LowestPriceFilter implements PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquiry, Promotion ...$promotions): PromotionEnquiryInterface
    {
        $enquiry->setPrice(500);
        $enquiry->setDiscountPrice(50);
        $enquiry->setPromotionName('Black Friday');

        return $enquiry;
    }

}
