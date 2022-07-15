<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->numerify('produto-####'),
            'valor' => $this->faker->randomFloat(2, 1, 1000),
            'codBarras' => $this->faker->numberBetween()
        ];
    }
}
