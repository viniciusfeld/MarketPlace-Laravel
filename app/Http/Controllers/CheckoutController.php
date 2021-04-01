<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;
use App\Models\UserOrder;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller
{
    public function index(){

               if(!auth()->check()){
                    return redirect()->route('login');
               }

       if(!session()->has('cart')) return redirect()->route('home');

       $cartItems = array_map(function($line){
        return $line['amount'] * $line['price'];
    }, session()->get('cart'));

    $cartItems = array_sum($cartItems);

    return view('checkout', compact('cartItems'));

    }
}
