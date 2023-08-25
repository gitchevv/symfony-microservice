<?php

namespace App\Filters;

use App\DTO\PromotionEnquiryInterface;

interface PromotionFilterInterface
{   
    public function apply(PromotionEnquiryInterface $enquiry, Promotion ...$promotion): PromotionEnquiryInterface;
    
}    
