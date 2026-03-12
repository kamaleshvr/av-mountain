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
        // Increase packet size for large base64 strings
        try {
            DB::statement('SET SESSION max_allowed_packet=104857600'); // 100MB
        } catch (\Exception $e) {
            // Might fail on some environments, ignore
        }

        // 1. Coconuts
        $coconuts = ProductCategory::firstOrCreate(
            ['slug' => 'coconuts'],
            [
                'name' => 'Coconuts', 
                'status' => true,
                'hero_image' => $this->encodeImage('images/categories/1771645551_bjjZ6HRNCx.jpeg'),
                'description' => 'Fresh, Desiccated, and Processed varieties'
            ]
        );
        
        $coconutsProducts = [
            [
                'name' => 'Whole Coconut',
                'description' => 'Fresh, mature coconuts with husk, perfect for religious offerings and culinary use.',
                'image' => $this->encodeImage('images/products/1771169395_vY0uwstyaz.jpeg'),
                'sort_order' => 1
            ],
            [
                'name' => 'Semi-Husked Coconut',
                'description' => 'Partially de-husked coconuts, easy to handle and with longer shelf life.',
                'image' => $this->encodeImage('images/products/1771169407_VvdXS5bfob.jpeg'),
                'sort_order' => 2
            ],
            [
                'name' => 'De-Husked Coconut',
                'description' => 'Fully de-husked coconuts, convenient for immediate processing and consumption.',
                'image' => $this->encodeImage('images/products/1771169417_8kVTBIgruZ.jpeg'), 
                'sort_order' => 3
            ],
            [
                'name' => 'Tender Coconut',
                'description' => 'Young coconuts filled with sweet, refreshing water and soft meat.',
                'image' => $this->encodeImage('images/products/1771169428_wfStwT8tup.jpeg'),
                'sort_order' => 4
            ],
            [
                'name' => 'Copra',
                'description' => 'Dried coconut kernels, essential for oil extraction and industrial use.',
                'image' => $this->encodeImage('images/products/1771169538_zprr8It8es.jpeg'),
                'sort_order' => 5
            ]
        ];

        // 2. Grains
        $grains = ProductCategory::firstOrCreate(
            ['slug' => 'grains'],
            [
                'name' => 'Grains', 
                'status' => true,
                'hero_image' => $this->encodeImage('images/categories/RdtORrfHdc5I70fxdTqaGCLXTQHHjxasow9pQ4mQ.jpg'),
                'description' => 'Rice, Wheat, Millet, and Staples'
            ]
        );

        $grainsProducts = [
            [
                'name' => 'Rice (Basmati & Non-Basmati)',
                'description' => 'Premium aromatic Basmati and high-quality non-Basmati rice varieties.',
                'image' => $this->encodeImage('images/products/1771169719_ti83I2Hn8A.jpeg'),
                'sort_order' => 1
            ],
            [
                'name' => 'Wheat',
                'description' => 'Golden grains of hard and soft wheat, ideal for flour and baking.',
                'image' => $this->encodeImage('images/products/1771169742_D5MD1UHmQq.jpeg'),
                'sort_order' => 2
            ],
            [
                'name' => 'Millets',
                'description' => 'Nutritious ancient grains including Pearl, Finger, and Foxtail millet.',
                'image' => $this->encodeImage('images/products/1771169759_zQ9dvlIoze.jpeg'),
                'sort_order' => 3
            ],
            [
                'name' => 'Maize (Corn)',
                'description' => 'High-quality yellow and white maize for food and industrial applications.',
                'image' => $this->encodeImage('images/products/1771169780_sN7wL9Abnl.jpeg'),
                'sort_order' => 4
            ],
            [
                'name' => 'Barley',
                'description' => 'Versatile grain used for malting, animal feed, and health foods.',
                'image' => $this->encodeImage('images/products/1771169864_rF6Y0b1Irp.jpeg'),
                'sort_order' => 5
            ],
            [
                'name' => 'Sorghum (Jowar)',
                'description' => 'Drought-resistant grain, rich in fiber and antioxidants.',
                'image' => $this->encodeImage('images/products/1771169900_mwKEUqBEZk.jpeg'),
                'sort_order' => 6
            ]
        ];

        // 3. Pulses
        $pulses = ProductCategory::firstOrCreate(
            ['slug' => 'pulses'],
            [
                'name' => 'Pulses', 
                'status' => true,
                'hero_image' => $this->encodeImage('images/categories/1771645567_fu2PiX83rG.jpeg'),
                'description' => 'Lentils, Chickpeas, Beans'
            ]
        );

        $pulsesProducts = [
            [
                'name' => 'Chickpeas (Kabuli & Desi)',
                'description' => 'Protein-rich chickpeas, available in large white and smaller brown varieties.',
                'image' => $this->encodeImage('images/products/1771169931_9IEN27lfAl.jpeg'),
                'sort_order' => 1
            ],
            [
                'name' => 'Lentils (Red, Green, Yellow)',
                'description' => 'Quick-cooking lentils, a staple source of plant-based protein.',
                'image' => $this->encodeImage('images/products/1771169956_WTaUgXwqmo.jpeg'),
                'sort_order' => 2
            ],
            [
                'name' => 'Kidney Beans (Rajma)',
                'description' => 'Robust red beans, perfect for curries and salads.',
                'image' => $this->encodeImage('images/products/1771170017_nQKk2fqBtI.jpeg'),
                'sort_order' => 3
            ],
            [
                'name' => 'Black Gram (Urad)',
                'description' => 'Essential for South Indian cuisine like idli and dosa batters.',
                'image' => $this->encodeImage('images/products/dbMWVFiIRqJVG3UU1fj25V2r6hK7Slx9tBIZcIf0.jpg'),
                'sort_order' => 4
            ],
             [
                'name' => 'Green Gram (Moong)',
                'description' => 'Highly nutritious and easy to digest, often used for sprouts.',
                'image' => $this->encodeImage('images/products/S6zGJdRi4jHokJkw1ZiN5joCeREpV5OtSd53nz5L.jpg'),
                'sort_order' => 5
            ]
        ];

        // 4. Vegetables
        $vegetables = ProductCategory::firstOrCreate(
            ['slug' => 'vegetables'],
            [
                'name' => 'Vegetables', 
                'status' => true,
                'hero_image' => $this->encodeImage('images/categories/1772971462_HysxKF762Q.jpeg'),
                'description' => 'Farm-Fresh Seasonal Produce'
            ]
        );

        $vegetablesProducts = [
            [
                'name' => 'Red Onion',
                'description' => 'Pungent and flavorful onions with a long shelf life.',
                'image' => $this->encodeImage('images/products/1771175851_O2zSN4DMGX.jpeg'),
                'sort_order' => 1
            ],
            [
                'name' => 'Potato',
                'description' => 'Starchy tubers available in various sizes for multiple culinary uses.',
                'image' => $this->encodeImage('images/products/1772971477_0kfgxu4Vwx.jpeg'),
                'sort_order' => 2
            ],
            [
                'name' => 'Tomato',
                'description' => 'Juicy, red tomatoes picked at peak ripeness.',
                'image' => $this->encodeImage('images/products/1772971462_HysxKF762Q.jpeg'),
                'sort_order' => 3
            ],
            [
                'name' => 'Green Chilli',
                'description' => 'Spicy and vibrant green chillies to add heat to your dishes.',
                'image' => $this->encodeImage('images/products/1588252303782-cb80119abd6d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 4
            ],
            [
                'name' => 'Drumstick',
                'description' => 'Nutritious pods rich in minerals, essential for sambar and curries.',
                'image' => $this->encodeImage('images/products/1595855726880-5b11910ef1cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 5
            ],
            [
                'name' => 'Okra (Ladies Finger)',
                'description' => 'Tender green pods perfect for frying and stews.',
                'image' => $this->encodeImage('images/products/1425543103986-22abb7d7e8d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 6
            ],
            [
                'name' => 'Brinjal (Eggplant)',
                'description' => 'Versatile purple vegetable used in diverse cuisines.',
                'image' => $this->encodeImage('images/products/1615485925763-867862880b05?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 7
            ],
            [
                'name' => 'Cabbage',
                'description' => 'Fresh, leafy heads packed with vitamins.',
                'image' => $this->encodeImage('images/products/1579586117180-2a5b6ce39969?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 7
            ],
            [
                'name' => 'Cauliflower',
                'description' => 'Firm, white florets ideal for steaming, roasting, or curries.',
                'image' => $this->encodeImage('images/products/1568584711075-3d021a7c3ca3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
                'sort_order' => 8
            ]
        ];

        // All products will be seeded. Large images will be handled by encodeImage helper.

        foreach ($coconutsProducts as $prod) {
            Product::firstOrCreate(
                ['name' => $prod['name']], 
                array_merge($prod, [
                    'category_id' => $coconuts->id,
                    'image' => $this->encodeImage($prod['image'])
                ])
            );
        }

        foreach ($grainsProducts as $prod) {
            Product::firstOrCreate(
                ['name' => $prod['name']], 
                array_merge($prod, [
                    'category_id' => $grains->id,
                    'image' => $this->encodeImage($prod['image'])
                ])
            );
        }

        foreach ($pulsesProducts as $prod) {
            Product::firstOrCreate(
                ['name' => $prod['name']], 
                array_merge($prod, [
                    'category_id' => $pulses->id,
                    'image' => $this->encodeImage($prod['image'])
                ])
            );
        }

        foreach ($vegetablesProducts as $prod) {
            Product::firstOrCreate(
                ['name' => $prod['name']], 
                array_merge($prod, [
                    'category_id' => $vegetables->id,
                    'image' => $this->encodeImage($prod['image'])
                ])
            );
        }
        
    }

    /**
     * Encode image to Base64 if storage mode is set to base64
     */
    private function encodeImage($path)
    {
        if (env('IMAGE_STORAGE_MODE') !== 'base64') {
            return $path;
        }

        // If it's already a URL
        if (preg_match('/^http/', $path)) {
            return $path;
        }

        $fullPath = public_path($path);
        if (file_exists($fullPath)) {
            // Skip huge files to avoid MySQL packet limits in local dev
            if (filesize($fullPath) > 1024 * 1024) { // 1MB Limit for seeder
                return $path;
            }

            $data = file_get_contents($fullPath);
            $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
            return 'data:image/' . $extension . ';base64,' . base64_encode($data);
        }

        return $path;
    }
}
