<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // index website
    public function index()
    {
        // ระบุที่อยู่ 
        $product_data = \App\Models\Product::all();
        return view('view_product', compact('product_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tmp = new \App\Models\Product();
        $tmp->name = $request->input('myname');
        $tmp->detail = $request->input('mydetails');
        $tmp->price = $request->input('myprice');
  
        $tmp->save();
        return redirect('/products')->with('Created','create product success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $tmp = \App\Models\Product::find($id);

        return view('edit_product',compact('tmp','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tmp = \App\Models\Product::find($id);
        $tmp->name=$request->get('myname');
        $tmp->detail=$request->get('mydetails');
        $tmp->price=$request->get('myprice');
        $tmp->save();

        return redirect('/products')->with('Update','update product successs!!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tmp = \App\Models\Product::find($id);
        $tmp->delete();
        return redirect('/products')->with('Remove','remove product success!!');
        
    }
}
?>