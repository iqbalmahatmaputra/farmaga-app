<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Str;


class BantuanController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('requests')->get();
        return view('pages.admin.bantuan.index',[
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
        $items = DB::table('products')->get();
        return view('pages.admin.bantuan.create',[
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
            'action' => 'Meminta',
            'description' => 'Meminta Bantuan '.$request->nama_product,
            'id_user' => Auth::user()->id,
            'nama_user' => Auth::user()->name
        );
        DB::table('activity_logs')->insert($log);

        DB::table('requests')->insert($data);
        Alert::toast('Data Berhasil ditambahkan', 'success');
        return redirect()->route('bantuan.index');
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
        $data = array(
            'status' => 'Selesai',
            'nama_pemberi' => Auth::user()->cabang,
            'replied_at' => date('Y-m-d H:i:s')
        );
        $log = array(
            'action' => 'Memeberi',
            'description' => 'Memberi Bantuan '.$id,
            'id_user' => Auth::user()->id,
            'nama_user' => Auth::user()->name
        );
        DB::table('activity_logs')->insert($log);
        

        DB::table('requests')->where('id_request',$id)->update($data);
        Alert::toast('Bantuan Berhasil Ditanggapi', 'success');

        return redirect()->route('bantuan.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::toast('Data Berhasil dihapus', 'success');
        $log = array(
            'action' => 'Menghapus',
            'description' => 'Menghapus Bantuan '.$id,
            'id_user' => Auth::user()->id,
            'nama_user' => Auth::user()->name
        );
        DB::table('activity_logs')->insert($log);
        
        DB::table('requests')->where('id_request',$id)->delete();

        return redirect()->route('bantuan.index');
    }
}
