<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTime();
        $courses = collect(['Geography', 'Mathematics', 'History', 'Physics', 'Biology', 'Chemistry', 'Literature', 'Philosophy', 'Economics', 'Computer Science']);
        $rooms = collect(['A101', 'A102', 'A103', 'A104', 'A105', 'A106', 'A107', 'A108', 'A109', 'A110']);

        return [
            'start' => $start,
            'end' => (clone $start)->modify('+2 hour'),
            'name' => $courses->random(),
            'room' => $rooms->random(),
        ];
    }
}
