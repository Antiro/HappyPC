<?php

namespace App\Http\Controllers;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        return view('auth.basket', ['basketServices' => auth()->user()->baskets()->get()]);
    }

    public function basketPlus(Request $request)
    {
        $service = Service::find($request->data);

        $serviceBasket = Basket::userBasketService($request->data);

        if ($serviceBasket === null) {
            $serviceBasket = Basket::userBasketAllServices()->create(['service_id' => $request->data]);
        }

        return new BasketResource($serviceBasket);
    }

    public function basketMinus(Basket $basket)
    {
        $basket_id=$basket->id;
        $user_id=Auth::user()->id;

        if ($user_id == $basket->user_id) {
            Basket::destroy($basket_id);
        }

        return redirect()->route('basket');
    }
}
