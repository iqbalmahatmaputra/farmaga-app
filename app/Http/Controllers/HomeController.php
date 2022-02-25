<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('Y.m.d');
        $this_month = date('m');
        $costPerDay = DB::table('product_orders')->selectRaw('sum(harga_order) as totalPerHari')->where('created_at','like',$today)->first();
        $costAll= DB::table('product_orders')->selectRaw('sum(harga_order) as total')->first();
        $pengeluarans = DB::table('v_order_user_cabang')->selectRaw('count(DISTINCT nomor_order) as totalOrder,sum(harga_order*qty) as total, cabang')->groupBy('cabang')->get();
        $pengeluaranBulanan = DB::table('v_order_user_cabang')->selectRaw('count(DISTINCT nomor_order) as totalOrder,sum(harga_order*qty) as total, cabang,limit_perbulan')->whereMonth('created_at',$this_month)->groupBy('cabang')->get();
        $harian = 0;
        if(empty($costPerDay->totalPerHari)){
            $harian = 0;
        }else{
            $harian = $costPerDay->totalPerHari;
        }
        $pbf = DB::table('v_stock_products_payments')->selectRaw('sum(total_harga) as total, nama_distributor, jenis, jumlah_product, tanggal_pembayaran, sum(jumlah) as jumlah_product, count(nomor_order_stock) as jumlahOrder')->groupBy('nama_distributor','jenis')->get();
        $totalOrder = DB::table('v_order_products_user')->where('status_order','!=','Keranjang')->count();
            
            $totalPendingOrder = DB::table('v_order_products_user')->where('status_order','Request')->count();
            $totalSelesaiOrder = DB::table('v_order_products_user')->where('status_order','Selesai')->count();
        $nama = Auth::user()->name ;
        $title = 'Welcome Back, '.$nama;
        return view('pages.admin.dashboard',compact('title','harian','costAll','totalOrder','totalSelesaiOrder','totalPendingOrder','pengeluarans','pengeluaranBulanan','pbf'));
    }
  
}
