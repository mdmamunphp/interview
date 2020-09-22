<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Product;

use App\Categorie;

use Illuminate\Http\UploadedFile;

class OrderController extends Controller
{

    public function index()
    {
        //
       $product =  DB::select("select * from products"); 
    //    $branche = Branche::all();
        $customer =DB::select("select * from customers");
      //  $sub = Subcategorie::all();
        $cate = DB::select("select * from categories");    
        
       // $unit = Unit::all();
        return view('order', compact('product','customer','cate'));

    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {




    
    }


    public function orderadd(Request $request)
    {
      

      $product = Product::find($request->product_id);

       // $id=$request->product_id;
        $cart = session()->get('cart');

        if (!$cart) {

                    $cart = [
                        $request->product_id => [
                            "name" => $product->name,
                            "product_id" => $request->product_id,
                            "price" => $request->purchase_price,
                            "quantity" => $request->quantity,
                        ]

                ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

       // return response()->json($cart);

       if(isset($cart[$request->product_id])) {

        $cart[$request->product_id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

     }
    $cart[$request->product_id] = [
        "name" => $product->name,
        "product_id" => $request->product_id,
        "price" => $request->purchase_price,
        "quantity" => $request->quantity
      
    ];

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart successfully!');



    }


    

    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        if($request->product_id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }

            session()->flash('success','Product removed successfully');
            return redirect()->back();
        }
        //
    }
}
