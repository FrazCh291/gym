<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->status == true){
            $status = 1;
        }else{
            $status = 0;
        }
        $product = Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
        ]);
        if($request->has('images')){
            foreach ($request->images as $image){
                       
            }
        }
        $data['message'] = 'Product Add Successfully';
        $data['status'] = 200;
        if(!empty($product)){
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Product::findorfail($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->status == true){
            $status = 1;
        }else{
            $status = 0;
        }
        $product = Product::where('id',$id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
        ]);
        $data['message'] = 'Product Update Successfully';
        $data['status'] = 200;
        if(!empty($product)){
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delProduct = Product::findorfail($id);
        $delProduct->delete();
        $data['message'] = 'Product Delete Successfully';
        return response()->json($data);
    }
}

