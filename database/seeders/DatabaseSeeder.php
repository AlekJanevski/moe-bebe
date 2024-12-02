<?php

namespace Database\Seeders;

use App\Models\PatientBaby;
use App\Models\PatientParent;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Алек Јаневски',
            'email' => 'alekjanevski@gmail.com',
            'baby_name' => 'Јане Јаневски',
            'baby_reference_id' => '007-700',
        ]);

        $this->call([
            PatientParentSeeder::class,
            PatientBabySeeder::class,
        ]);

        // Attach relationships
        $parent = PatientParent::first();
        $child = PatientBaby::first();
        $parent->children()->attach($child->id);
    }
}
