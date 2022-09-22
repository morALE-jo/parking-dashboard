<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // AM_NOTE: This regex will be used to verify validity (might be optimized)
            'plate' => $this->faker->regexify('([A-Z]{1,3})-([A-Z]{1,2})[1-9][0-9]{0,3}'),
            'owner' => $this->faker->name(),
            'start_date' => $this->faker->dateTimeThisDecade(),
            'end_date' => $this->faker->dateTimeThisDecade('+2 years')
        ];
    }
}
