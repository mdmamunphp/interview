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
use App\Branche;
use App\Purchase;

use App\Categorie;

use Illuminate\Http\UploadedFile;

class ProductController extends Controller
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
        return view('product', compact('product','customer','cate'));

    }


    public function create()
    {
        //
    }
    public function store(Request $request)
    {

// echo $request->pname;
// die();
$rand=rand(10,100);

        $product =new Product;
        $product->name=$request->pname;
        $product->quantity=$request->qty;
        $product->categories_id=$request->category_id;
        $product->price=$request->price;
        $product->sku=$rand;
        $product->save();

        // $p_id=$purchase->id;
       // return response()->json($purchase);


        return redirect()->back();

        //return view('invoice.store');
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
        // if($request->product_id) {

        //     $cart = session()->get('cart');

        //     if(isset($cart[$request->product_id])) {
        //         unset($cart[$request->product_id]);
        //         session()->put('cart', $cart);
        //     }

        //     session()->flash('success','Product removed successfully');
        //     return redirect()->back();
       // }
        //
    }
}
