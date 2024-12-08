<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

public function show()
{
    // Fetch the user's cart with associated products
    $products = Cart::with('product')->where('user_id', Auth::id())->get();

    return view('panier.panier', compact('products'));
}

public function add(Request $request, $productId)
{
    // Check if the product exists
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->back()->with('error', 'Produit non trouvé.');
    }

    $cartItem = Cart::firstOrNew([
        'user_id' => Auth::id(),
        'product_id' => $productId
    ]);

    $cartItem->quantity += 1; 
    $cartItem->save();

    return redirect()->route('panier')->with('success', 'Produit ajouté au panier!');
}

public function remove($id)
{
    $cartItem = Cart::find($id);
    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('panier')->with('success', 'Produit retiré du panier.');
    }

    return redirect()->route('panier')->with('error', 'Produit non trouvé.');
}

}
