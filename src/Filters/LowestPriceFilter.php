<?php

namespace App\Filters;

use App\Entity\Promotion;
use App\DTO\PromotionEnquiryInterface;


class LowestPriceFilter implements PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquiry, Promotion ...$promotion): PromotionEnquiryInterface
    {
        $enquiry->setPrice(500);
        $enquiry->setDiscountPrice(50);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday');

        return $enquiry;
    }

}
