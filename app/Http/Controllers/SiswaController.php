<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('siswa.index');
    }

    public function showAll()
    {
        $siswa = Siswa::orderBy('nama_siswa','ASC')->get();
        $sekolah = Sekolah::orderBy('nama_sekolah','ASC')->get();
        return response()->json([
            'siswa' => $siswa,
            'sekolah' => $sekolah
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
        $id = DB::table('siswa')->max('id') + 1;

        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:siswa|max:11',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages()
            ]);
        }else{
            $siswa = new Siswa;
            $siswa->id = $id;
            $siswa->nisn = $request->input('nisn');
            $siswa->nama_siswa = $request->input('nama_siswa');
            $siswa->jenis_kelamin = $request->input('jenis_kelamin');
            $siswa->alamat = $request->input('alamat');
            $siswa->sekolah_id = $request->input('sekolah_id');
            $siswa->save();
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
        $siswa = Siswa::find($id);
        if($siswa){
            return response()->json([
                'status'=>200,
                'siswa'=>$siswa
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Siswa tidak terdaftar'
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
            // 'nisn' => 'required|unique:siswa|max:11',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required',
        ]);
        
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages()
            ]);
        }else{
            $siswa = Siswa::find($id);
            if($siswa){
                // $siswa->nisn = $request->input('nisn');
                $siswa->nama_siswa = $request->input('nama_siswa');
                $siswa->jenis_kelamin = $request->input('jenis_kelamin');
                $siswa->alamat = $request->input('alamat');
                $siswa->sekolah_id = $request->input('sekolah_id');            
                $siswa->update();
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
        $siswa = Siswa::find($id);
        $siswa->delete();
        return response()->json([
            'status'=>'200',
            'message'=> 'Data telah di hapus' 
        ]);
    }

}
