<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        return view('home.UserPage');
    }
    public function redirect()
    {
        $user=Auth::user()->usertype;
        if ($user=='1')
        {
            return view('admin.home');
        }
        $products=product::paginate(3);

        return view('home.UserPage',compact('products'));
    }


    public function stripePost(Request $request,$totalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => $totalPrice*100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment",
        ]);

      return 's';
        Session::flash('success', 'Payment Successfull!');

        return back();
    }
      public function  showuserproducts()
         
      {
        return view('home.ShowCart');



      }       
    

}
