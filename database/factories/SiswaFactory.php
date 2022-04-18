<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Siswa::class;
    
    public function definition()
    {
        static $number = 2;
        return [
            'id' => $number,
            'nisn' => $number++,
            'nama_siswa' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['male', 'female']),
            'alamat' => $this->faker->address,
            'sekolah_id' => rand(1,5),
        ];
        
    }
}
