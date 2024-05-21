<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'ic_no' => $this->faker->unique()->numerify('S#######D'),
            'address' => $this->faker->address,
            'contact_info' => $this->faker->phoneNumber
        ];
    }
}