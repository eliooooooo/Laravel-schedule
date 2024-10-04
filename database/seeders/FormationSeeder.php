<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = ['MMI1', 'MMI2', 'MMI3', 'QLIO1', 'QLIO2', 'QLIO3', 'GEII1', 'GEII2', 'GEII3'];
        foreach ($formations as $formation) {
            Formation::create([
                'name' => $formation,
            ]);
        }
    }
}
