<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Str;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('products')->get();
        return view('pages.admin.product.index',[
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
        $items = DB::table('products')
        ->select('satuan_product')->get();
        return view('pages.admin.product.create',[
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        Product::create($data);
        return redirect()->route('product.index');
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
        $item = DB::table('products')->where('id_product',$id)->first();
        return view('pages.admin.product.edit',[
            'item' => $item, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data =$request->except(['_token', '_method' ]);

        // $item = \DB::table('distributors')->where('id_distributor',$id_distributor)->first();
        // $item->update($data);   
       $item =  DB::table('products')->where('id_product',$id)->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id_product',$id)->delete();

        return redirect()->route('product.index');
    }
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('products')->select('id_product','satuan_product')
                    ->where('satuan_product','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Product::where('satuan_product', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
    public function autocomplete(){
        $term = Input::get('term');
        
        $results = array();
        
        $queries = DB::table('products')
            ->where('satuan_product', 'LIKE', '%'.$term.'%')
            // ->orWhere('last_name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->satuan_product];
        }
    return Response::json($results);
    }
}
