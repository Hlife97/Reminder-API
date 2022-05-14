<?php

namespace Database\Factories;

use App\Models\Reminder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReminderFactory extends Factory
{
    protected $model = Reminder::class;

    public function definition(): array
    {
    	return [
    	    'title' => $this->faker->sentence,
            'time' => $this->faker->dateTimeThisYear()
    	];
    }
}
