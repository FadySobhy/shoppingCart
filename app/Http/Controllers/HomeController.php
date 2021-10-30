<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index() {
        return view('home', $this->homeService->getData());
    }

    public function addItemToCart(Request $request) {
        $this->homeService->addToSession($request->product_id);

        return response()->json( ['result' => count(Session::get('cart'))] );
    }
}
