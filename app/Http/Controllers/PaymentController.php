<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    //
    public function create(Request $request)
    {
        
        $totalAmount = $request->query('amount');

        return view('payment.create', compact('totalAmount'));
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        
        try {
            Charge::create([
                'amount' => $request->input('amount') * 100, 
                'currency' => 'eur', 
                'source' => $request->input('stripeToken'),
                'description' => 'Payment for Cart Items',
            ]);
              
              $cartItems = Cart::where('user_id', Auth::id())->get();
              // Inside the charge method
    DB::transaction(function () use ($cartItems) {
    foreach ($cartItems as $cartItem) {
        $product = Product::find($cartItem->product_id);
        if ($product) {
            // Ensure there is enough stock before deducting
            if ($product->quantity >= $cartItem->quantity) {
                $product->quantity -= $cartItem->quantity;
                $product->save(); // Save the updated product
            } else {
                throw new \Exception('Not enough stock for ' . $product->name);
            }
        }
    }
});
           
            //   foreach ($cartItems as $cartItem) {
            //       $product = Product::find($cartItem->product_id);
            //       if ($product) {
                      
            //           $product->quantity -= $cartItem->quantity;
            //           $product->save(); 
            //       }
            //   }

            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('panier')->with('success', 'Paiement réussi!');
        } catch (\Exception $e) {
            return redirect()->route('panier')->with('error', 'Erreur lors du paiement: ' . $e->getMessage());
        }
    }
}
