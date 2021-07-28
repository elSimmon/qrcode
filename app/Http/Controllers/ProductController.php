<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|string',
          'price' => 'required|numeric',
          'quantity' => 'required|numeric',
          'expirydate' => 'required',
          'imagepath' => 'required',
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
        // \QrCode::size(500)
        //          ->format('png')
        //          ->generate('ItSolutionStuff.com', public_path('img/qrcodes/qrcode.png'));
        return view('productpage')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('editProduct')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expirydate' => 'required',
        ]);

//        $product->user_id = $user_id;
//        $product->name = $request->name;
//        $product->price = $request->price;
//        $product->quantity = $request->quantity;
//        $product->expirydate = $request->expirydate;
        DB::table('products')->where('id', $request->id)->update(['name' => $request->name, 'price' => $request->price, 'quantity' => $request->quantity, 'expirydate'=> $request->expirydate]);
        If($request->hasFile('imagepath')){
            $picture = $request -> file('imagepath');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('/img/products/' .$filename);
            Image::make($picture)->save($location);
//            $product->imagepath = $filename;
            DB::table('products')->where('id', $request->id)->update(['imagepath' => $filename]);
        }
        return redirect()->route('allProducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::where('id', $id)->delete();
      return back();
    }
}
