<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Admin\ProductOrderRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\ProductOrder;




class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == "ADMIN" || Auth::user()->roles == "GDG") {
            # code...
            $items = DB::table('v_order_user_cabang')->where('status_order', 'Request')
            ->selectRaw('sum(qty) as qty,sum(qty*harga_order) as harga_order,id_product,id_distributor, nama_product,nama_distributor ,created_at ,nomor_order,cabang,status_order,limit_perhari,limit_perbulan')
            ->groupBy('nomor_order')
            ->get();
            $totalOrder = DB::table('v_order_products_user')->where('status_order','Request')->count();
            $totalPendingOrder = DB::table('v_order_products_user')->where('status_order','Request')->count();
            $totalSelesaiOrder = DB::table('v_order_products_user')->where('status_order','Selesai')->count();
            return view('pages.admin.productOrder.index',[
                'items' => $items,
                'totalOrder' => $totalOrder,
                'totalPendingOrder' => $totalPendingOrder,
                'totalSelesaiOrder' => $totalSelesaiOrder
            ]);
        }elseif(Auth::user()->roles == "USER"){
            $saya = Auth::user()->cabang;

            $items = DB::table('v_order_products_user')->where('cabang',Auth::user()->cabang)->get();
            $totalOrder = DB::table('v_order_products_user')->where('status_order', '!=','Keranjang')->where('cabang',Auth::user()->cabang)->count();
            $totalPendingOrder = DB::table('v_order_products_user')->where('cabang',Auth::user()->cabang)->where('status_order','Request')->count();
            $totalSelesaiOrder = DB::table('v_order_products_user')->where('cabang',Auth::user()->cabang)->where('status_order','Selesai')->count();
       
            return view('pages.admin.productOrder.index',[
                'items' => $items,
                'totalOrder' => $totalOrder,
                'totalPendingOrder' => $totalPendingOrder,
                'totalSelesaiOrder' => $totalSelesaiOrder
            ]);
        }else{
            echo "Tidak Member";
        }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.productOrder.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cariId = \DB::table('v_harga_produk')->select('id_product_price','id_product','id_distributor','harga')
                    ->where('id_product_price',$request->id_product_price)
                    ->first();
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $nomorUrut = \DB::table('product_orders')->distinct()->count('nomor_order')->where('nomor_order','LIKE',"%$today%");
       $satu = 1;
        $nomor_order = sprintf("%03s", abs($nomorUrut + $satu))."/".Auth::user()->cabang."/".$today;

        $data = array();
        $data['id_product_price'] = $request->id_product_price;
        $data['qty'] = $request->qty;
        $data['id_product'] = $cariId->id_product;
        $data['id_distributor'] = $cariId->id_distributor;
        $data['harga_order'] = $cariId->harga;
        $data['status_order'] = 'Request';
        $data['id_user'] = Auth::user()->id;
        $data['nomor_order'] = $nomor_order;
    	DB::table('product_orders')->insert($data);

        return redirect()->route('productOrder.index');


    }

    public function AddMoreOrder(Request $request){
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $satu = 1;
        $nomorUrut = \DB::table('product_orders')->where('nomor_order','LIKE',"%$today%")->distinct()->count('nomor_order');

        // $nomorUrut = \DB::table('product_orders')->where('created_at','LIKE',"$hariOrder%")->where('id_user',Auth::user()->id)->count();
        // $nomor_order = sprintf("%03s", abs($nomorUrut + $satu))."/".Auth::user()->cabang."/".$today;
        $nomor_order = sprintf("%03s", abs(Auth::user()->id_cabang))."/".Auth::user()->cabang."/".$today;
        $data = array();

        $hitung = count($request->id_product_price);
        if($hitung >= 1 && $request->id_product_price[0] != '')
        {
            for($i=0;$i<$hitung;$i++)
            {
                $cariId = \DB::table('v_harga_produk')->select('id_product_price','id_product','id_distributor','harga')
                    ->where('id_product_price',$request->id_product_price[$i])
                    ->first();
                $save = new ProductOrder;
                $save->id_product_price = $request->id_product_price[$i];
                $save->qty = $request->qty[$i];
                $save->id_product = $cariId->id_product;
                $save->id_distributor = $cariId->id_distributor;
                $save->harga_order = $cariId->harga;
                $save->status_order = 'Keranjang';
                $save->id_user = Auth::user()->id;
                $save->nomor_order = $nomor_order;
                $save->save();
            }
        }

        return redirect()->route('productOrder.index');
    }
    public function AddMoreOrder_b(Request $request)
    {
        $today = date('Y.m.d');
        $hariOrder = date('Y-m-d');
        $satu = 1;
        $nomorUrut = \DB::table('product_orders')->where('nomor_order','LIKE',"%$today%")->distinct()->count('nomor_order');

        // $nomorUrut = \DB::table('product_orders')->where('created_at','LIKE',"$hariOrder%")->where('id_user',Auth::user()->id)->count();
        $nomor_order = sprintf("%03s", abs($nomorUrut + $satu))."/".Auth::user()->cabang."/".$today;
        $data = array();

        $hitung = count($request->id_product_price);
        if($hitung >= 1 && $request->id_product_price[0] != '')
        {
            for($i=0;$i<$hitung;$i++)
            {
                $cariId = \DB::table('v_harga_produk')->select('id_product_price','id_product','id_distributor','harga')
                    ->where('id_product_price',$request->id_product_price[$i])
                    ->first();
                $save = new ProductOrder;
                $save->id_product_price = $request->id_product_price[$i];
                $save->qty = $request->qty[$i];
                $save->id_product = $cariId->id_product;
                $save->id_distributor = $cariId->id_distributor;
                $save->harga_order = $cariId->harga;
                $save->status_order = 'Request';
                $save->id_user = Auth::user()->id;
                $save->nomor_order = $nomor_order;
                $save->save();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomor = str_replace("-","/",$id);
            $items = DB::table('v_order_products_user')->where('status_order', '!=','Keranjang')
            ->where('nomor_order',$nomor)
            ->get();
            $title = "List Details for ".$nomor;
$this->getOrderData($nomor);
        return view('pages.admin.productOrder.show',compact('items','title','id'));
    }
    public function getOrderData($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_order_products_user')
            ->where('nomor_order',$nomor)
            ->where('status_order',"Request")
            ->get();
        return json_encode(array('data'=>$items));
    }
    public function getOrderDataProses($id){
        $nomor = str_replace("-","/",$id);
        $items = DB::table('v_order_products_user')
            ->where('nomor_order',$nomor)
            ->where('status_order',"Proses")
            ->get();
        return json_encode(array('data'=>$items));
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
    public function updateToProses1($id){
        DB::table('product_orders')->where('id_product_order',$id)->update(['status_order' => 'Proses']);
        return json_encode(array('statusCode'=>200));
    }
    public function updateToProses($id){
        DB::table('product_orders')->where('id_product_order',$id)->update(['status_order' => 'Proses']);
        return json_encode(array('statusCode'=>200));
    }
    public function updateToProsesBatal1($id){
        DB::table('product_orders')->where('id_product_order',$id)->update(['status_order' => 'Request']);
        return json_encode(array('statusCode'=>200));
    }
    public function updateToProsesBatal($id){
        DB::table('product_orders')->where('id_product_order',$id)->update(['status_order' => 'Request']);
        return json_encode(array('statusCode'=>200));
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
        DB::table('product_orders')->where('id_product_order',$id)->update(['status_order' => 'Request']);

        return redirect()->route('productOrder.index');
    }
    public function CheckOutAll(Request $request){
        DB::table('product_orders')->where('nomor_order',$request->nomor_order)->where('status_order','Keranjang')->update(['status_order' => 'Request']);

        return redirect()->route('productOrder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_orders')->where('id_product_order',$id)->delete();

        return redirect()->route('productOrder.index');
    }

    public function dataAjaxProduct(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_harga_produk')->select('id_product_price',DB::raw("CONCAT(nama_product,' - ',nama_distributor) as nama"))
                    ->where('nama_product','LIKE',"%$search%")
                    ->orwhere('nama_distributor','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
    public function dataAjaxDistributor(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            
                    $data = \DB::table('v_harga_produk')->select('id_distributor','nama_distributor')
                    ->where('nama_distributor','LIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
}
