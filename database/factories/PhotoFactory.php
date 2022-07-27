<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => null,
            'sort'      => 500,
            'published' => 1,
            'path'      => null,
            'tag'       => null,
        ];
    }
}
