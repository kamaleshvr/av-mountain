<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Coconuts
        $coconuts = ProductCategory::create([
            'name' => 'Coconuts', 
            'slug' => 'coconuts', 
            'status' => true,
            'hero_image' => 'https://images.unsplash.com/photo-1544558635-667480601430?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
            'description' => 'Fresh, Desiccated, and Processed varieties'
        ]);
        
        $coconuts->products()->createMany([
            [
                'name' => 'Whole Coconut',
                'description' => 'Fresh, mature coconuts with husk, perfect for religious offerings and culinary use.',
                'image' => 'https://images.unsplash.com/photo-1596386461350-326ea7750f6b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 1
            ],
            [
                'name' => 'Semi-Husked Coconut',
                'description' => 'Partially de-husked coconuts, easy to handle and with longer shelf life.',
                'image' => 'https://images.unsplash.com/photo-1624823183492-4b248006d482?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 2
            ],
            [
                'name' => 'De-Husked Coconut',
                'description' => 'Fully de-husked coconuts, convenient for immediate processing and consumption.',
                'image' => 'https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80', 
                'sort_order' => 3
            ],
            [
                'name' => 'Tender Coconut',
                'description' => 'Young coconuts filled with sweet, refreshing water and soft meat.',
                'image' => 'https://images.unsplash.com/photo-1533604118557-41a4a44b2046?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 4
            ],
            [
                'name' => 'Copra',
                'description' => 'Dried coconut kernels, essential for oil extraction and industrial use.',
                'image' => 'https://images.unsplash.com/photo-1647915594191-2a6c38210350?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 5
            ]
        ]);

        // 2. Grains
        $grains = ProductCategory::create([
            'name' => 'Grains', 
            'slug' => 'grains', 
            'status' => true,
            'hero_image' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
            'description' => 'Rice, Wheat, Millet, and Staples'
        ]);

        $grains->products()->createMany([
            [
                'name' => 'Rice (Basmati & Non-Basmati)',
                'description' => 'Premium aromatic Basmati and high-quality non-Basmati rice varieties.',
                'image' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 1
            ],
            [
                'name' => 'Wheat',
                'description' => 'Golden grains of hard and soft wheat, ideal for flour and baking.',
                'image' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 2
            ],
            [
                'name' => 'Millets',
                'description' => 'Nutritious ancient grains including Pearl, Finger, and Foxtail millet.',
                'image' => 'https://images.unsplash.com/photo-1627485937980-221c88ac04f9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 3
            ],
            [
                'name' => 'Maize (Corn)',
                'description' => 'High-quality yellow and white maize for food and industrial applications.',
                'image' => 'https://images.unsplash.com/photo-1551754655-cd27e38d2076?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 4
            ],
            [
                'name' => 'Barley',
                'description' => 'Versatile grain used for malting, animal feed, and health foods.',
                'image' => 'https://images.unsplash.com/photo-1596707328643-8557b779ec40?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 5
            ],
            [
                'name' => 'Sorghum (Jowar)',
                'description' => 'Drought-resistant grain, rich in fiber and antioxidants.',
                'image' => 'https://images.unsplash.com/photo-1631526437937-295982823055?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 6
            ]
        ]);

        // 3. Pulses
        $pulses = ProductCategory::create([
            'name' => 'Pulses', 
            'slug' => 'pulses', 
            'status' => true,
            'hero_image' => 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
            'description' => 'Lentils, Chickpeas, Beans'
        ]);

        $pulses->products()->createMany([
            [
                'name' => 'Chickpeas (Kabuli & Desi)',
                'description' => 'Protein-rich chickpeas, available in large white and smaller brown varieties.',
                'image' => 'https://images.unsplash.com/photo-1585996024357-3f37351666e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 1
            ],
            [
                'name' => 'Lentils (Red, Green, Yellow)',
                'description' => 'Quick-cooking lentils, a staple source of plant-based protein.',
                'image' => 'https://images.unsplash.com/photo-1515544779607-b67aaaf6152a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 2
            ],
            [
                'name' => 'Kidney Beans (Rajma)',
                'description' => 'Robust red beans, perfect for curries and salads.',
                'image' => 'https://images.unsplash.com/photo-1595183885542-a25381f08cb4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 3
            ],
            [
                'name' => 'Black Gram (Urad)',
                'description' => 'Essential for South Indian cuisine like idli and dosa batters.',
                'image' => 'https://images.unsplash.com/photo-1601633533804-03e059556d11?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 4
            ],
             [
                'name' => 'Green Gram (Moong)',
                'description' => 'Highly nutritious and easy to digest, often used for sprouts.',
                'image' => 'https://images.unsplash.com/photo-1628103328575-b60584742a08?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 5
            ]
        ]);

        // 4. Vegetables
        $vegetables = ProductCategory::create([
            'name' => 'Vegetables', 
            'slug' => 'vegetables', 
            'status' => true,
            'hero_image' => 'https://images.unsplash.com/photo-1597362925123-77861d3fb714?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80',
            'description' => 'Farm-Fresh Seasonal Produce'
        ]);

        $vegetables->products()->createMany([
            [
                'name' => 'Red Onion',
                'description' => 'Pungent and flavorful onions with a long shelf life.',
                'image' => 'https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 1
            ],
            [
                'name' => 'Potato',
                'description' => 'Starchy tubers available in various sizes for multiple culinary uses.',
                'image' => 'https://images.unsplash.com/photo-1518977676601-b53f82a6b69d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 2
            ],
            [
                'name' => 'Tomato',
                'description' => 'Juicy, red tomatoes picked at peak ripeness.',
                'image' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 3
            ],
            [
                'name' => 'Green Chilli',
                'description' => 'Spicy and vibrant green chillies to add heat to your dishes.',
                'image' => 'https://images.unsplash.com/photo-1588252303782-cb80119abd6d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 4
            ],
            [
                'name' => 'Drumstick',
                'description' => 'Nutritious pods rich in minerals, essential for sambar and curries.',
                'image' => 'https://images.unsplash.com/photo-1595855726880-5b11910ef1cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 5
            ],
            [
                'name' => 'Okra (Ladies Finger)',
                'description' => 'Tender green pods perfect for frying and stews.',
                'image' => 'https://images.unsplash.com/photo-1425543103986-22abb7d7e8d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 6
            ],
            [
                'name' => 'Brinjal (Eggplant)',
                'description' => 'Versatile purple vegetable used in diverse cuisines.',
                'image' => 'https://images.unsplash.com/photo-1615485925763-867862880b05?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 7
            ],
            [
                'name' => 'Cabbage',
                'description' => 'Fresh, leafy heads packed with vitamins.',
                'image' => 'https://images.unsplash.com/photo-1579586117180-2a5b6ce39969?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 7
            ],
            [
                'name' => 'Cauliflower',
                'description' => 'Firm, white florets ideal for steaming, roasting, or curries.',
                'image' => 'https://images.unsplash.com/photo-1568584711075-3d021a7c3ca3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'sort_order' => 8
            ]
        ]);
        
    }
}
