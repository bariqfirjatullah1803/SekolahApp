<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'siswa';
    protected $fillable = [
        'id',
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'alamat',
        'sekolah_id'
    ];

    protected $hidden = [];
}
