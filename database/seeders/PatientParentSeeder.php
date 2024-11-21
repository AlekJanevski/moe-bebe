<?php

namespace Database\Seeders;

use App\Models\PatientParent;
use Illuminate\Database\Seeder;

class PatientParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientParent::create([
            'name' => 'Alek Janevski',
            'email' => 'alekjanevski@gmail.com',
            'user_id' => 1
        ]);
    }
}
