<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('v_order_products_user')->get();
        $distributors = DB::table('distributors as d')
        ->select(array('v.*','d.nama_distributor as nama_distributor',DB::raw('COUNT(v.id_product_order) as orderan')))
        ->leftjoin('v_order_products_user as v', 'v.id_distributor', '=', 'd.id_distributor')
        ->groupBy('d.nama_distributor')->get();

   

        $cabangs = DB::table('v_order_products_user')
        ->select(array('*',DB::raw('COUNT(id_product_order) as orderan')))
        // ->where('status_order', '!=','Keranjang')
        ->groupBy('cabang')->get();
        
        return view('pages.admin.warehouse.index',[
            'items' => $items,
            'cabangs' => $cabangs,
            'distributors' => $distributors,

           
        ]);
    }

    public function detailDist($id){
        $items = DB::table('v_order_products_user')->where('id_distributor',$id)->get();
        $title = DB::table('v_order_products_user')->select('nama_distributor','id_distributor')->where('id_distributor',$id)->first();
        
            return view('pages.admin.warehouse.detail',[
                'items' => $items,
                'nama' => $title,
            ]);
    }
    public function detailOrder($id){
        $items = DB::table('v_order_products_user')->where('id_distributor',$id)->get();
        $title = DB::table('v_order_products_user')->select('nama_distributor')->where('id_distributor',$id)->first();
        
            return view('pages.admin.warehouse.create2',[
                'items' => $items,
                'nama' => $title,
            ]);
    }
    public function dataAjaxProduct(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_order_products_user')->select('id_product_price',DB::raw("CONCAT(nama_product,' - ',nama_distributor) as nama"))
                    ->where('nama_product','LIKE',"%$search%")
                    ->orwhere('nama_distributor','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
