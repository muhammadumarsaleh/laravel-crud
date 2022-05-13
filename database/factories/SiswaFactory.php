<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
             'user_id' => 100,
             'nama_depan' => $this->faker->name(),
             'nama_belakang' => '',
             'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
             'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
             'alamat' => $this->faker->address()
        ];
    }
}
