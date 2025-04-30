<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergies = [
            ['name' => 'Peanuts'],
            ['name' => 'Tree Nuts'],
            ['name' => 'Milk'],
            ['name' => 'Eggs'],
            ['name' => 'Fish'],
            ['name' => 'Shellfish'],
            ['name' => 'Soy'],
            ['name' => 'Wheat'],
            ['name' => 'Gluten'],
            ['name' => 'Sesame'],
            ['name' => 'Sulfites'],
        ];

        foreach ($allergies as $allergy) {
            Allergy::create($allergy);
        }
    }
}