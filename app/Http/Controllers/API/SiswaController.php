<?php
 
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;
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
        $siswa = Siswa::all();

        return new PostResource(true,'List Data Siswa', $siswa);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $nisn = (int)date("y").$id;

        $validator = Validator::make($request->all(), [
            // 'nisn' => 'required|unique:siswa,nisn|max:11',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required',        
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $siswa = Siswa::create([
            'id' => $id,
            'nisn' => $nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'sekolah_id' => $request->sekolah_id,
        ]);

        return new PostResource(true, 'Data Berhasil Ditambahkan!', $siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return new PostResource(true,'Data di Temukan',$siswa);
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
    public function update(Request $request,Siswa $siswa)
    {
        $id = DB::table('siswa')->max('id') + 1;
        $nisn = (int)date("y").$id;

        $validator = Validator::make($request->all(), [
            // 'nisn' => 'required|unique:siswa,nisn',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'sekolah_id' => 'required',
    ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $siswa->update([
            'id' => $id,
            'nisn' => $nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'sekolah_id' => $request->sekolah_id,
    ]);
        return new PostResource(true, 'Data Berhasil Diubah!',$siswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        
        return new PostResource(true,'Data berhasil di hapus!', null);

    }
}
