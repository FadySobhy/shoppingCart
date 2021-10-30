<?php

namespace App\Http\Controllers;

use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function checkout() {
        $this->checkoutService->checkout();
        $result = $this->checkoutService->getResult();
        return view('checkout', compact('result'));
    }
}
