<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekolah.index');
    }
    public function showAll()
    {
        $sekolah = Sekolah::all();
        return response()->json([
            'sekolah'=>$sekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $sekolah = new Sekolah;
        $validator = Validator::make($request->all(), [
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages()
            ]);
        }else{
            $sekolah = new Sekolah;
            $sekolah->nama_sekolah = $request->input('nama_sekolah');
            $sekolah->alamat_sekolah = $request->input('alamat_sekolah');
            $sekolah->save();
            return response()->json([
                'status'=>200,
                'message'=>'Data sekolah telah di tambahkan'
            ]);

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
        $sekolah = Sekolah::find($id);
        if($sekolah){
            return response()->json([
                'status'=>200,
                'sekolah'=>$sekolah
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Sekolah tidak terdaftar'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages()
            ]);
        }else{
            $sekolah = Sekolah::find($id);
            if($sekolah){
            $sekolah->nama_sekolah = $request->input('nama_sekolah');
            // $sekolah->alamat_sekolah = $request->input('alamat_sekolah');
            $sekolah->update();
            return response()->json([
                'status'=>200,
                'message'=>'Data sekolah telah di perbarui'
            ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Sekolah tidak terdaftar'
                ]);
            }
            

        }
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
        $sekolah = Sekolah::find($id);
        $sekolah->delete();
        return response()->json([
            'status'=>'200',
            'message'=> 'Data telah di hapus' 
        ]);
    }
}
