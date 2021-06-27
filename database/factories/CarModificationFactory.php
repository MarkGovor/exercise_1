<?php

namespace Database\Factories;

use App\Models\CarModification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarModificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarModification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstName(),
            'from_made' => $this->faker->date(),
            'to_made' => $this->faker->date(),
            'generation' => rand(1, 10),
        ];
    }
}
