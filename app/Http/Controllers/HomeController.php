<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $expired = DB::table('products')->whereDate('expirydate', '<=', \Carbon\Carbon::now())->get();
        $products = DB::table('products')->get();
        return view('home')->withProducts($products)->withExpired($expired);
    }

    public function important(){
      $products = DB::table('products')->whereDate('expirydate', '<=', \Carbon\Carbon::now())->get();
      return view('expiredproducts')->withProducts($products);
    }
}
