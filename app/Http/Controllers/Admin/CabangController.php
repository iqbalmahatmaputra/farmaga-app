<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('cabangs')->get();
        return view('pages.admin.cabang.index',[
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
        $items = DB::table('cabangs')->get();
        return view('pages.admin.cabang.create',[
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->except(['_token', '_method' ]);
        $log = array(
            'action' => 'Menambahkan',
            'description' => 'Menambahkan Cabang '.$request->nama_cabang,
            'id_user' => Auth::user()->id,
            'nama_user' => Auth::user()->name
        );
        DB::table('activity_logs')->insert($log);
        DB::table('cabangs')->insert($data);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('cabang.index');
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
        $item = DB::table('cabangs')->where('id_cabang',$id)->first();
        return view('pages.admin.cabang.edit',[
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
    public function update(Request $request, $id)
    {
        $data =$request->except(['_token', '_method' ]);
  
       $item =  DB::table('cabangs')->where('id_cabang',$id)->update($data);
        return redirect()->route('cabang.index');
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
