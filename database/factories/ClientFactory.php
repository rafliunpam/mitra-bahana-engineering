<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_client' => $this->faker->phoneNumber(), 
            'company_name' => $this->faker->company() ,
            'alamat' => $this ->faker->address(),
            'contact_person' => $this->faker->unique()->name(),
            'jabatan_cp' => $this->faker->jobTitle(),
            'kota' => $this->faker->city(),
            'no_tlp' => $this->faker->unique()->phoneNumber()
            // 'catatan' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
