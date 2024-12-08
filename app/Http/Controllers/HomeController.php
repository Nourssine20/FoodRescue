<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
  {
    $products = Product::where('stock_status', 'disponible')->get();
    $offres=Offre::where('available_until','>',Carbon::now())->get();

    return view('frontend.main', compact(['products','offres']));
  }
}
