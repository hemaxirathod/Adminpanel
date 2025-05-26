<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return response()->json(['message'=>"list of products", "data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = Validator::make($request->all(),[
            "pname" => "required|string",
            "price" => "required|integer",
            "qty"=> "required|integer",
            "total_price" => "integer"
        ]);

        if($validatedata->fails()){
            return response()->json(["error"=>$validatedata]);
        }
        $data = new Product;
        $data->pname = $request->pname;
        $data->price = $request->price;
        $data->qty = $request->qty;
        $data->total_price = $request->price * $request->qty;
        if($validatedata){
            $data->save();
            return response()->json(['message'=>'prouduct created']);
        }
        else{
            return reponse()->json(['message'=>'product not created']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        if($data){
            return response()->json(["message"=>"list : " , "data"=>$data]);
        }
        else{
            return response()->json(['message'=>'product not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);
        // return $data;
        if($data){
            $data->pname = $request->pname;
            $data->price = $request->price;
            $data->qty = $request->qty;
            $data->total_price = $request->price * $request->qty;
            $data->save();
            return response()->json(['message'=>'prouduct updated']);
        }
        else{
            return response()->json(['message'=>'product id not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        if($data){
            $data->delete();
            return response()->json(['message'=>'product deleted']);
        }else{
            return response()->json(['message'=>'product id not found']);
        }
      
    }
}
