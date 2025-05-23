<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Seeder;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodItems = [
            // Fruits
            [
                'name' => 'Apple',
                'serving_size_description' => '1 medium (182g)',
                'serving_size_grams' => 182,
                'calories_per_serving' => 95,
                'protein_grams_per_serving' => 0.5,
                'carb_grams_per_serving' => 25.1,
                'fat_grams_per_serving' => 0.3,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/apple.jpg',
            ],
            [
                'name' => 'Banana',
                'serving_size_description' => '1 medium (118g)',
                'serving_size_grams' => 118,
                'calories_per_serving' => 105,
                'protein_grams_per_serving' => 1.3,
                'carb_grams_per_serving' => 27.0,
                'fat_grams_per_serving' => 0.4,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/banana.jpg',
            ],
            [
                'name' => 'Avocado',
                'serving_size_description' => '1/2 medium (68g)',
                'serving_size_grams' => 68,
                'calories_per_serving' => 114,
                'protein_grams_per_serving' => 1.3,
                'carb_grams_per_serving' => 6.0,
                'fat_grams_per_serving' => 10.5,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/avocado.jpg',
            ],
            
            // Vegetables
            [
                'name' => 'Broccoli',
                'serving_size_description' => '1 cup chopped (91g)',
                'serving_size_grams' => 91,
                'calories_per_serving' => 31,
                'protein_grams_per_serving' => 2.6,
                'carb_grams_per_serving' => 6.0,
                'fat_grams_per_serving' => 0.3,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/broccoli.jpg',
            ],
            [
                'name' => 'Spinach',
                'serving_size_description' => '1 cup raw (30g)',
                'serving_size_grams' => 30,
                'calories_per_serving' => 7,
                'protein_grams_per_serving' => 0.9,
                'carb_grams_per_serving' => 1.1,
                'fat_grams_per_serving' => 0.1,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/spinach.jpg',
            ],
            
            // Proteins
            [
                'name' => 'Chicken Breast',
                'serving_size_description' => '3 oz cooked (85g)',
                'serving_size_grams' => 85,
                'calories_per_serving' => 140,
                'protein_grams_per_serving' => 26.0,
                'carb_grams_per_serving' => 0,
                'fat_grams_per_serving' => 3.0,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/chicken-breast.jpg',
            ],
            [
                'name' => 'Salmon',
                'serving_size_description' => '3 oz (85g)',
                'serving_size_grams' => 85,
                'calories_per_serving' => 177,
                'protein_grams_per_serving' => 19.0,
                'carb_grams_per_serving' => 0,
                'fat_grams_per_serving' => 11.0,
                'allergy_info' => ['Fish'],
                'image_url' => 'https://example.com/images/salmon.jpg',
            ],
            [
                'name' => 'Eggs',
                'serving_size_description' => '1 large (50g)',
                'serving_size_grams' => 50,
                'calories_per_serving' => 72,
                'protein_grams_per_serving' => 6.3,
                'carb_grams_per_serving' => 0.4,
                'fat_grams_per_serving' => 5.0,
                'allergy_info' => ['Eggs'],
                'image_url' => 'https://example.com/images/egg.jpg',
            ],
            [
                'name' => 'Tofu, Firm',
                'serving_size_description' => '1/2 cup (126g)',
                'serving_size_grams' => 126,
                'calories_per_serving' => 94,
                'protein_grams_per_serving' => 10.0,
                'carb_grams_per_serving' => 2.3,
                'fat_grams_per_serving' => 5.0,
                'allergy_info' => ['Soy'],
                'image_url' => 'https://example.com/images/tofu.jpg',
            ],
            
            // Dairy
            [
                'name' => 'Greek Yogurt, Plain',
                'serving_size_description' => '6 oz (170g)',
                'serving_size_grams' => 170,
                'calories_per_serving' => 100,
                'protein_grams_per_serving' => 17.0,
                'carb_grams_per_serving' => 6.0,
                'fat_grams_per_serving' => 0.7,
                'allergy_info' => ['Milk'],
                'image_url' => 'https://example.com/images/greek-yogurt.jpg',
            ],
            [
                'name' => 'Cheddar Cheese',
                'serving_size_description' => '1 oz (28g)',
                'serving_size_grams' => 28,
                'calories_per_serving' => 114,
                'protein_grams_per_serving' => 7.0,
                'carb_grams_per_serving' => 0.9,
                'fat_grams_per_serving' => 9.4,
                'allergy_info' => ['Milk'],
                'image_url' => 'https://example.com/images/cheddar-cheese.jpg',
            ],
            
            // Grains
            [
                'name' => 'Brown Rice',
                'serving_size_description' => '1 cup cooked (195g)',
                'serving_size_grams' => 195,
                'calories_per_serving' => 216,
                'protein_grams_per_serving' => 5.0,
                'carb_grams_per_serving' => 45.0,
                'fat_grams_per_serving' => 1.8,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/brown-rice.jpg',
            ],
            [
                'name' => 'Quinoa',
                'serving_size_description' => '1 cup cooked (185g)',
                'serving_size_grams' => 185,
                'calories_per_serving' => 222,
                'protein_grams_per_serving' => 8.1,
                'carb_grams_per_serving' => 39.0,
                'fat_grams_per_serving' => 3.6,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/quinoa.jpg',
            ],
            [
                'name' => 'Whole Wheat Bread',
                'serving_size_description' => '1 slice (45g)',
                'serving_size_grams' => 45,
                'calories_per_serving' => 110,
                'protein_grams_per_serving' => 4.0,
                'carb_grams_per_serving' => 20.0,
                'fat_grams_per_serving' => 1.5,
                'allergy_info' => ['Wheat', 'Gluten'],
                'image_url' => 'https://example.com/images/whole-wheat-bread.jpg',
            ],
            
            // Legumes
            [
                'name' => 'Black Beans',
                'serving_size_description' => '1/2 cup cooked (86g)',
                'serving_size_grams' => 86,
                'calories_per_serving' => 114,
                'protein_grams_per_serving' => 7.6,
                'carb_grams_per_serving' => 20.4,
                'fat_grams_per_serving' => 0.5,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/black-beans.jpg',
            ],
            [
                'name' => 'Chickpeas',
                'serving_size_description' => '1/2 cup cooked (82g)',
                'serving_size_grams' => 82,
                'calories_per_serving' => 134,
                'protein_grams_per_serving' => 7.0,
                'carb_grams_per_serving' => 22.5,
                'fat_grams_per_serving' => 2.1,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/chickpeas.jpg',
            ],
            
            // Nuts and Seeds
            [
                'name' => 'Almonds',
                'serving_size_description' => '1 oz (28g)',
                'serving_size_grams' => 28,
                'calories_per_serving' => 164,
                'protein_grams_per_serving' => 6.0,
                'carb_grams_per_serving' => 6.1,
                'fat_grams_per_serving' => 14.0,
                'allergy_info' => ['Tree Nuts'],
                'image_url' => 'https://example.com/images/almonds.jpg',
            ],
            [
                'name' => 'Peanut Butter',
                'serving_size_description' => '2 tbsp (32g)',
                'serving_size_grams' => 32,
                'calories_per_serving' => 188,
                'protein_grams_per_serving' => 8.0,
                'carb_grams_per_serving' => 6.0,
                'fat_grams_per_serving' => 16.0,
                'allergy_info' => ['Peanuts'],
                'image_url' => 'https://example.com/images/peanut-butter.jpg',
            ],
            [
                'name' => 'Chia Seeds',
                'serving_size_description' => '1 oz (28g)',
                'serving_size_grams' => 28,
                'calories_per_serving' => 138,
                'protein_grams_per_serving' => 4.7,
                'carb_grams_per_serving' => 12.0,
                'fat_grams_per_serving' => 8.7,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/chia-seeds.jpg',
            ],
            
            // Processed Foods
            [
                'name' => 'Protein Powder (Whey)',
                'serving_size_description' => '1 scoop (30g)',
                'serving_size_grams' => 30,
                'calories_per_serving' => 120,
                'protein_grams_per_serving' => 24.0,
                'carb_grams_per_serving' => 3.0,
                'fat_grams_per_serving' => 1.5,
                'allergy_info' => ['Milk'],
                'image_url' => 'https://example.com/images/whey-protein.jpg',
            ],
            [
                'name' => 'Protein Bar',
                'serving_size_description' => '1 bar (60g)',
                'serving_size_grams' => 60,
                'calories_per_serving' => 210,
                'protein_grams_per_serving' => 20.0,
                'carb_grams_per_serving' => 25.0,
                'fat_grams_per_serving' => 7.0,
                'allergy_info' => ['Milk', 'Soy'],
                'image_url' => 'https://example.com/images/protein-bar.jpg',
            ],
            [
                'name' => 'Oatmeal',
                'serving_size_description' => '1/2 cup dry (40g)',
                'serving_size_grams' => 40,
                'calories_per_serving' => 150,
                'protein_grams_per_serving' => 5.0,
                'carb_grams_per_serving' => 27.0,
                'fat_grams_per_serving' => 3.0,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/oatmeal.jpg',
            ],
            
            // Oils and Fats
            [
                'name' => 'Olive Oil',
                'serving_size_description' => '1 tbsp (14g)',
                'serving_size_grams' => 14,
                'calories_per_serving' => 119,
                'protein_grams_per_serving' => 0,
                'carb_grams_per_serving' => 0,
                'fat_grams_per_serving' => 13.5,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/olive-oil.jpg',
            ],
            [
                'name' => 'Avocado Oil',
                'serving_size_description' => '1 tbsp (14g)',
                'serving_size_grams' => 14,
                'calories_per_serving' => 124,
                'protein_grams_per_serving' => 0,
                'carb_grams_per_serving' => 0,
                'fat_grams_per_serving' => 14.0,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/avocado-oil.jpg',
            ],
            
            // Beverages
            [
                'name' => 'Almond Milk',
                'serving_size_description' => '1 cup (240ml)',
                'serving_size_grams' => 240,
                'calories_per_serving' => 39,
                'protein_grams_per_serving' => 1.5,
                'carb_grams_per_serving' => 3.5,
                'fat_grams_per_serving' => 2.5,
                'allergy_info' => ['Tree Nuts'],
                'image_url' => 'https://example.com/images/almond-milk.jpg',
            ],
            [
                'name' => 'Coconut Water',
                'serving_size_description' => '1 cup (240ml)',
                'serving_size_grams' => 240,
                'calories_per_serving' => 46,
                'protein_grams_per_serving' => 1.7,
                'carb_grams_per_serving' => 9.0,
                'fat_grams_per_serving' => 0.5,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/coconut-water.jpg',
            ],
            
            // Snacks
            [
                'name' => 'Dark Chocolate (70% cocoa)',
                'serving_size_description' => '1 oz (28g)',
                'serving_size_grams' => 28,
                'calories_per_serving' => 170,
                'protein_grams_per_serving' => 2.0,
                'carb_grams_per_serving' => 13.0,
                'fat_grams_per_serving' => 12.0,
                'allergy_info' => ['Milk', 'Soy'],
                'image_url' => 'https://example.com/images/dark-chocolate.jpg',
            ],
            [
                'name' => 'Rice Cakes',
                'serving_size_description' => '2 cakes (18g)',
                'serving_size_grams' => 18,
                'calories_per_serving' => 70,
                'protein_grams_per_serving' => 1.0,
                'carb_grams_per_serving' => 15.0,
                'fat_grams_per_serving' => 0.5,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/rice-cakes.jpg',
            ],
            [
                'name' => 'Sweet Potato',
                'serving_size_description' => '1 medium (114g)',
                'serving_size_grams' => 114,
                'calories_per_serving' => 103,
                'protein_grams_per_serving' => 2.0,
                'carb_grams_per_serving' => 24.0,
                'fat_grams_per_serving' => 0.2,
                'allergy_info' => null,
                'image_url' => 'https://example.com/images/sweet-potato.jpg',
            ],
        ];

        foreach ($foodItems as $foodItem) {
            FoodItem::create($foodItem);
        }
    }
}