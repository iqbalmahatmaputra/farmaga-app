<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Http\Requests\Admin\DistributorRequest;
use Illuminate\Support\Str;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Distributor::all();
        $items =\DB::table('distributors')->get();
        return view('pages.admin.distributor.index',[
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
        //
        return view('pages.admin.distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributorRequest $request)
    {
        Alert::toast('Data Berhasil ditambahkan', 'success');

        $data = $request->all();
        Distributor::create($data);
        return redirect()->route('distributor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit($id_distributor)
    {
        $item = \DB::table('distributors')->where('id_distributor',$id_distributor)->first();
        return view('pages.admin.distributor.edit',[
            'item' => $item, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(DistributorRequest $request,$id_distributor)
    {
        $data =$request->except(['_token', '_method' ]);

        // $item = \DB::table('distributors')->where('id_distributor',$id_distributor)->first();
        // $item->update($data);   
        Alert::toast('Data Berhasil diubah', 'success');

       $item =  \DB::table('distributors')->where('id_distributor',$id_distributor)->update($data);
        return redirect()->route('distributor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Alert::toast('Data Berhasil dihapus', 'success');

        \DB::table('distributors')->where('id_distributor',$id)->delete();

        return redirect()->route('distributor.index');
    }
    public function delete($id)
    {
       
    }
}
