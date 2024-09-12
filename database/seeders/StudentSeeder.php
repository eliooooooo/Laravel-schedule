<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = Formation::all()->pluck('id');
        Student::factory(20)
            ->state(new Sequence(
                fn(Sequence $sequence) => ['formation_id' => $formations->random()]
            ))->create();
    }
}
