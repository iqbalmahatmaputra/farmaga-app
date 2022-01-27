<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('isActive');
    }
    public function index()
    {
        $items =\DB::table('users')->get();
        return view('pages.admin.user.index',[
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
        $data =$request->except(['_token', '_method' ]);
        $item =  \DB::table('users')->where('id',$id)->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $data = $request->all();
        $item =  \DB::table('users')->where('id',$id)->update($data);
        return redirect()->route('user.index');
    }
    
    
    /* Responds with a welcome message with instructions
    *
    * @return \Illuminate\Http\Response
    */
   public function changeStatus(Request $request)
   {
    $data =$request->except(['_token', '_method' ]);
    //    $user = User::find($request->id);
    $items =  User::find($request->id);
       $items->status = $request->status;
       $items->save();
 
       return response()->json(['success'=>'Status change successfully.']);
   }
}
