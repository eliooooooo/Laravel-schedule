<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = ['TD1', 'TD2', 'TD3'];
        foreach($groups as $group) {
            Group::create([
                'name' => $group,
            ]);
        };
    }
}
