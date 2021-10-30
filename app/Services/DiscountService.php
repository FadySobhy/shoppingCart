<?php


namespace App\Services;


class DiscountService
{
    private $jacketPrice        = 0;
    private $jacketDiscount     = false;
    private $discounts          = [];

    public function checkDiscount($product) {
        $price = $product->price;

        if ($product->id == 1 || $product->id == 2) {
            if ($this->jacketPrice !== 0) {
                $discount   = $this->jacketPrice * 50 / 100;
                $price      = $product->price - $discount;
                $this->discounts['50% off jacket: '] = '-$'.$discount;
            }
            else {
                $this->jacketDiscount = true;
            }
        }
        elseif ($product->id == 5) {
            if ($this->jacketDiscount) {
                $discount   = $price * 50 / 100;
                $price      -= $discount;
                $this->discounts['50% off jacket: '] = '-$'.$discount;
            }
            else {
                $this->jacketPrice = $price;
            }
        }
        elseif ($product->id == 6) {
            $discount = $price * 10 / 100;
            $price -= $discount;
            $this->discounts['10% off shoes: '] = '-$'.$discount;
        }

        return $price;
    }

    public function addExtraDiscountTitle($key, $value) {
        $this->discounts[$key] = '-$'.$value;
    }

    public function getDiscounts() {
        return $this->discounts;
    }

}
