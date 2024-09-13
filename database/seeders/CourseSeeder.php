<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Group;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = Formation::all()->pluck('id');
        $groups = Group::all()->pluck('id');
        Course::factory(60)
            ->state(new Sequence(
                fn(Sequence $sequence) => ['formation_id' => $formations->random(), 'group_id' => $groups->random()]
            ))
            ->create();
    }
}
