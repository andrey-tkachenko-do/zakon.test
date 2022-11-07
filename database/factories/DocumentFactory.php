<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class DocumentFactory extends Factory
{

    public function definition()
    {
        $faker = Faker::create();
        return [
            'title'=>$faker->realText(128),
            'body'=>$faker->realText(8000),
        ];
    }
}
