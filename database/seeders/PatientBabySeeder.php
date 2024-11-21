<?php

namespace Database\Seeders;

use App\Models\PatientBaby;
use Illuminate\Database\Seeder;

class PatientBabySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientBaby::create([
            'name' => 'Јане Јаневски',
            'age' => 1,
            'born_at' => '2024-02-01',
            'is_fed' => true,
            'is_sleeping' => false,
            'food_amount' => 160,
            'weight' => 1400,
            'body_temperature' => 36.6,
            'medicine_taken' => true,
            'appointment_date' => '2024-10-16',
        ]);
    }
}
