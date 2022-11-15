<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catagory>
 */
class CatagoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $catagory_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($catagory_name);
        return [
            'name' => $catagory_name,
            'slug' => $slug
        ];
    }
}
