<?php

namespace App\DTO;

use App\Entity\Product;
use Symfony\Component\Serializer\Annotation\Ignore;

class LowestPriceEnquiry implements PromotionEnquiryInterface
{
	#[Ignore]
    private ?Product $product;
    private ?int $quantity;
	#[Ignore]
    private ?string $requestLocation;
    private ?string $voucherCode;
    private ?string $requestDate;
    private ?int $price;
    private ?int $discountPrice;
    private ?int $promotionId;
    private ?string $promotionName;
    
	


	/**
	 * @return 
	 */
	public function getQuantity(): ?int {
		return $this->quantity;
	}
	
	/**
	 * @param  $quantity 
	 * @return self
	 */
	public function setQuantity(?int $quantity): self {
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getVoucherCode(): ?string {
		return $this->voucherCode;
	}
	
	/**
	 * @param  $voucherCode 
	 * @return self
	 */
	public function setVoucherCode(?string $voucherCode): self {
		$this->voucherCode = $voucherCode;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getRequestDate(): ?string {
		return $this->requestDate;
	}
	
	/**
	 * @param  $requestDate 
	 * @return self
	 */
	public function setRequestDate(?string $requestDate): self {
		$this->requestDate = $requestDate;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getPrice(): ?int {
		return $this->price;
	}
	
	/**
	 * @param  $price 
	 * @return self
	 */
	public function setPrice(?int $price): self {
		$this->price = $price;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getDiscountPrice(): ?int {
		return $this->discountPrice;
	}
	
	/**
	 * @param  $discountPrice 
	 * @return self
	 */
	public function setDiscountPrice(?int $discountPrice): self {
		$this->discountPrice = $discountPrice;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getPromotionId(): ?int {
		return $this->promotionId;
	}
	
	/**
	 * @param  $promotionId 
	 * @return self
	 */
	public function setPromotionId(?int $promotionId): self {
		$this->promotionId = $promotionId;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getPromotionName(): ?string {
		return $this->promotionName;
	}
	
	/**
	 * @param  $promotionName 
	 * @return self
	 */
	public function setPromotionName(?string $promotionName): self {
		$this->promotionName = $promotionName;
		return $this;
	}

	// public function jsonSerialize(){
	// 	return get_object_vars($this);
	// }

	/**
	 * @return 
	 */
	public function getProduct(): ?Product {
		return $this->product;
	}
	
	/**
	 * @param  $product 
	 * @return self
	 */
	public function setProduct(?Product $product): self {
		$this->product = $product;
		return $this;
	}
}
