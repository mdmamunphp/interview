<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
//use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Categorie;

//images upload

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=DB::select("select * from categories");
        return view('category',compact('result'));
    }

    public function get_details(Request $request)
    {
       $id=$request->category_id;
       $result=DB::select("select c.name cate_name, p.name p_name FROM categories c inner join products p on c.id=p.categories_id where c.id='$id';");
      //  $order = Categorie::find($data);
            if(isset($order)){
             //   return response(view('order', compact('order'))->render());
            }


    //  return  response()->json($user);
      return  response()->json($result);
      //  
    }

    public function category_detelete(Request $request)
    {
        $id=$request->category_id;
        $result=DB::delete("delete from products where categories_id='$id'");
        $res=DB::delete("delete from categories where id='$id'");
        return  response()->json("success");
    }
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
        DB::insert("insert into categories set name='$request->name'");
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
