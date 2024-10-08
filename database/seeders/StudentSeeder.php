<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = Formation::all()->pluck('id');
        $groups = Group::all()->pluck('id');
        Student::factory(80)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['formation_id' => $formations->random()]
            ))
            ->afterCreating(fn (Student $student) => $student->groups()->attach($groups->random()))
            ->create();
    }
}
