<?php

namespace Database\Factories;

use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sekolah::class;
    public function definition()
    {
        static $number = 1; 
        return [
            'nama_sekolah' => 'SMK Negeri '.$number++,
            'alamat_sekolah' => 'Kota Malang',
        ];
    }
}
