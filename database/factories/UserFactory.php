<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $naming = $this->faker->name();
        return [
            'name' => Helper::Naming(0, $naming),
            'username' => Helper::Naming(1, $naming),
            'status' => mt_rand(2, 4),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => Helper::emailVerRand(mt_rand(0, 1)),
            'password' => bcrypt('testing123'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

class Helper
{
    public function emailVerRand(int $input)
    {
        switch ($input) {
            case '0':
                return null;
                break;
            default:
                return now();
                break;
        }
    }

    public function Naming(int $input, string $name)
    {
        switch ($input) {
            case 0:
                return $name;
            default:
                if (strpos($name, '. ')) {
                    return strtolower(str_replace(' ', '-', preg_replace('/[W]/', '', explode('. ', $name)[1])));
                }
                return strtolower(str_replace(' ', '-', preg_replace('/[W]/', '', $name)));
        }
    }
}
