<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publicacion;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Publicacion::class;
    public function definition(): array
    {
        return [
            'nombre_publicacion' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'foto_portada' => $this->faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'id_usuario' => $this->faker->randomElement([1, 11, 7, 9, 10]),
            'id_profesion' => $this->faker->randomElement([1, 2,]),
        ];
    }
}
