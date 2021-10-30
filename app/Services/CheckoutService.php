<?php


namespace App\Services;

use App\Repositories\Interfaces\InterfaceProductRepository;
use Illuminate\Support\Facades\Session;

class CheckoutService
{
    private $interfaceProductRepository;
    private $discountService;
    private $subtotalBeforeDisc = 0;
    private $subtotal           = 0;
    private $shipping           = 0;
    private $shippingDisc       = 0;
    private $vat                = 0;
    private $total              = 0;

    public function __construct(InterfaceProductRepository $interfaceProductRepository, DiscountService $discountService)
    {
        $this->interfaceProductRepository   = $interfaceProductRepository;
        $this->discountService              = $discountService;
    }

    public function checkout() {
        $cart = Session::get('cart');

        foreach ($cart as $product) {
            $this->sumSubTotalBeforeDisc($product->price);
            $price = $this->discountService->checkDiscount($product);
            $this->sumSubTotal($price);
            $this->sumShipping($product);
        }

        if (count($cart) >= 2) {
            $this->shippingDisc = 10;
            $this->discountService->addExtraDiscountTitle('$10 of shipping: ', 10);
        }

        $this->sumVAT();
        $this->sumTotal();
    }

    private function sumSubTotalBeforeDisc ($price) {
        $this->subtotalBeforeDisc += $price;
    }

    private function sumSubTotal ($price) {
        $this->subtotal += $price;
    }

    private function sumShipping ($product) {
        $rate = ($product->weight * 1000 / 100) * $product->shipping_rate->rate;
        $this->shipping += $rate;
    }

    private function sumVAT () {
        $this->vat = ($this->subtotalBeforeDisc * 14) / 100;
    }

    private function sumTotal () {
        $this->total += $this->subtotal + $this->shipping + $this->vat - $this->shippingDisc;
    }

    public function getResult() {
        $result                 = [];
        $result['Subtotal']     = $this->subtotalBeforeDisc;
        $result['Shipping']     = $this->shipping;
        $result['VAT']          = $this->vat;
        $result['Discounts']    = $this->discountService->getDiscounts();
        $result['Total']        = $this->total;
        return $result;
//        return [
//            'Subtotal' => $this->subtotalBeforeDisc,
//            'Shipping' => $this->shipping,
//            'VAT' => $this->vat,
//            'Discounts' => $this->discountService->getDiscounts(),
//            'Total' => $this->total
//        ];
    }

}
