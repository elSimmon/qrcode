<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products =  Product::all();
      return view('productlist')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addproductform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|string',
          'price' => 'required|numeric',
          'quantity' => 'required|numeric',
          'expirydate' => 'required',
        ]);

        $user_id = Auth::User()->id;
        $product = new Product();
        $product->user_id = $user_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->expirydate = $request->expirydate;
        $product->qrcode = time().'.'.rand(11, 27);
        If($request->hasFile('imagepath')){
            $picture = $request -> file('imagepath');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('/img/products/' .$filename);
            Image::make($picture)->save($location);
            $product->imagepath = $filename;
        }
        $product->save();
        return back()->with('success', 'Product uploaded with QR Code Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('productpage')->with($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
