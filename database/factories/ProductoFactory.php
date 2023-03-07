<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('es_ES');
        return [
            //
            "nombreProducto" => $this->faker->name(),
            "descripcion" => $this->faker->text(),
            "stock" => $this->faker->numberBetween(0,100),
            "precioUnitario" => $this->faker->randomFloat(2,10,90),
        ];
    }
}
