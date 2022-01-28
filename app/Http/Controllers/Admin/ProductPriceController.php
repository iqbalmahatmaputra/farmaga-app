<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductPrice;
use App\Http\Requests\Admin\ProductPriceRequest;
use Illuminate\Support\Str;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =\DB::table('v_harga_produk')->get();
        return view('pages.admin.productPrice.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items =\DB::table('distributors')->get();
        $product_items =\DB::table('products')->get();
       
        return view('pages.admin.productPrice.create',[
            'items' => $items,
            'product_items' => $product_items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductPriceRequest $request)
    {
        $data =$request->except(['_token', '_method' ]);
        \DB::table('products_price')->insert($data);
        return redirect()->route('productPrice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $items = \DB::table('products_price')->where('id_product_price',$id)->first();
        // $product_items =\DB::table('v_harga_products')->get();
        $product_items = \DB::table('v_harga_produk')->where('id_product_price',$id)->get();
        $pilihs = \DB::table('v_harga_produk')->where('id_product_price',$id)->first();
        $dist_items =\DB::table('distributors')->get();
        $prod_items =\DB::table('products')->get();
        return view('pages.admin.productPrice.edit',[
            'items' => $items, 
            'product_items' => $product_items,
            'dist_items' => $dist_items,
            'prod_items' => $prod_items,
            'pilihs' => $pilihs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductPriceRequest $request, $id)
    {
        $data =$request->except(['_token', '_method' ]);

        // $item = \DB::table('distributors')->where('id_distributor',$id_distributor)->first();
        // $item->update($data);   
       $item =  \DB::table('products_price')->where('id_product_price',$id)->update($data);
        return redirect()->route('productPrice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('products_price')->where('id_product_price',$id)->delete();

        return redirect()->route('productPrice.index');
    }
    public function dataAjaxProduct(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('products')->select('id_product','nama_product')
                    ->where('nama_product','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
}