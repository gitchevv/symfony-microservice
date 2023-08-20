<?php

namespace App\Filters;

use App\DTO\PromotionEnquiryInterface;


class LowestPriceFilter implements PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquiry): PromotionEnquiryInterface
    {
        $enquiry->setPrice(500);
        $enquiry->setDiscountPrice(50);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday');

        return $enquiry;
    }

}
