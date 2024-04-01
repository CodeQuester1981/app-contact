<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Lorem;

class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $interests = ['Archery', 'Boxing', 'Aquascaping', 'Dog Sled Racing', 'Mountain Climbing', 'Gaming'];

        $selectedInterests = $this->faker->randomElements($interests, 3);

        return [
            'user_id' => function () {
                return \App\Models\User::inRandomOrder()->first()->id;
            },
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'id_number' => $this->faker->creditCardNumber(),
            'mobile_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'language' => $this->faker->randomElement(['English', 'Spanish', 'Hebrew', 'German', 'Greek']),
            'interests' => implode(', ', $selectedInterests),
        ];
    }
}