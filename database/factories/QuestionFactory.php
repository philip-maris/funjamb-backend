<?php

namespace Database\Factories;

use App\Models\V1\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\V1\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Question::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence() ,
            'questionType' => $this->faker->randomElement(['COMPREHENSION','LEXIS', 'ORAL']),
            'optionA' => $this->faker->word(),
            'optionB',
            'optionC',
            'optionD',
            'answer',
            'questionStatus',
        ];
    }
}
