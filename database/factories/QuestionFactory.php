<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> Str::random(10),
            'course_id' => 1,
            'score'=>1,
            'content'=>json_encode(['question'=>Str::random(10)]),
            'type'=>'descriptive',
        ];
    }
}
