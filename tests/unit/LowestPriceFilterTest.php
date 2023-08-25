<?php

namespace App\Tests\unit;
use App\Entity\Promotion;
use App\Tests\ServiceTestCase;
use App\DTO\LowestPriceEnquiry;
use App\Filters\LowestPriceFilter;


class LowestPriceFilterTest extends ServiceTestCase
{
    /** @test */
    public function lowest_price_promotions_filtering_is_applied_correctly(): void
    {

        //GIVEN
        $enquiry = new LowestPriceEnquiry();
        $promotions = $this->promotionsDataProvider();
        $lowestPriceFilter = $this->container->get(LowestPriceFilter::class);
        
        // WHEN
        $filteredEnquiry = $lowestPriceFilter->apply($enquiry, ...$promotions);
        
        // THEN
        $this->assertSame(500, $filteredEnquiry->getPrice());
        $this->assertSame(50, $filteredEnquiry->getDiscountPrice());
        $this->assertSame('Black Friday', $filteredEnquiry->getPromotionName());

    }  
    
    public function promotionsDataProvider()
    {
        $promotionOne = new Promotion();
        $promotionOne->setName('Black Friday');
        $promotionOne->setAdjustment(0.5);
        $promotionOne->setCriteria(["from" => "2023-11-25", "to" => "2023-11-28"]);
        $promotionOne->setType('date_range_multiplier');
     
        $promotionTwo = new Promotion();
        $promotionTwo->setName('Voucher VO237');
        $promotionTwo->setAdjustment(100);
        $promotionTwo->setCriteria(["code" => "0237"]);
        $promotionTwo->setType('fixed_price_voucher');

        $promotionThree = new Promotion();
        $promotionThree->setName('Christmas discount');
        $promotionThree->setAdjustment(2);
        $promotionThree->setCriteria(["minimum_quantity" => 2]);
        $promotionThree->setType('even_items_multiplier');

        return [$promotionOne, $promotionTwo, $promotionThree];
    }
}   
