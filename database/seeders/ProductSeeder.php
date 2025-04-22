<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Kem dưỡng ẩm Innisfree',
                'description' => 'Kem dưỡng ẩm chiết xuất từ trà xanh, giúp da mềm mịn và căng bóng',
                'price' => 350000,
                'sale_price' => 300000,
                'stock' => 100,
                'image' => 'images/products/innisfree-moisturizer.jpg',
                'gallery' => json_encode([
                    'images/products/innisfree-moisturizer-1.jpg',
                    'images/products/innisfree-moisturizer-2.jpg'
                ]),
                'status' => true,
                'category_id' => 1
            ],
            [
                'name' => 'Son môi MAC Ruby Woo',
                'description' => 'Son môi matte màu đỏ rượu vang, lâu trôi và không khô môi',
                'price' => 450000,
                'stock' => 50,
                'image' => 'images/products/mac-ruby-woo.jpg',
                'gallery' => json_encode([
                    'images/products/mac-ruby-woo-1.jpg',
                    'images/products/mac-ruby-woo-2.jpg'
                ]),
                'status' => true,
                'category_id' => 2
            ],
            [
                'name' => 'Dầu gội Kerastase',
                'description' => 'Dầu gội dưỡng tóc chuyên sâu, giúp tóc mềm mượt và bóng khỏe',
                'price' => 550000,
                'sale_price' => 500000,
                'stock' => 80,
                'image' => 'images/products/kerastase-shampoo.jpg',
                'gallery' => json_encode([
                    'images/products/kerastase-shampoo-1.jpg',
                    'images/products/kerastase-shampoo-2.jpg'
                ]),
                'status' => true,
                'category_id' => 3
            ],
            [
                'name' => 'Nước hoa Chanel No.5',
                'description' => 'Nước hoa hương hoa cổ điển, sang trọng và quyến rũ',
                'price' => 2500000,
                'stock' => 30,
                'image' => 'images/products/chanel-no5.jpg',
                'gallery' => json_encode([
                    'images/products/chanel-no5-1.jpg',
                    'images/products/chanel-no5-2.jpg'
                ]),
                'status' => true,
                'category_id' => 4
            ],
            [
                'name' => 'Sữa tắm Dove',
                'description' => 'Sữa tắm dưỡng ẩm, giúp da mềm mịn và thơm mát',
                'price' => 120000,
                'sale_price' => 100000,
                'stock' => 200,
                'image' => 'images/products/dove-body-wash.jpg',
                'gallery' => json_encode([
                    'images/products/dove-body-wash-1.jpg',
                    'images/products/dove-body-wash-2.jpg'
                ]),
                'status' => true,
                'category_id' => 5
            ],
            [
                'name' => 'Toner Laneige',
                'description' => 'Toner cân bằng độ ẩm, giúp da sáng mịn và se khít lỗ chân lông',
                'price' => 400000,
                'stock' => 70,
                'image' => 'images/products/laneige-toner.jpg',
                'gallery' => json_encode([
                    'images/products/laneige-toner-1.jpg',
                    'images/products/laneige-toner-2.jpg'
                ]),
                'status' => true,
                'category_id' => 1
            ],
            [
                'name' => 'Phấn nền Estee Lauder',
                'description' => 'Phấn nền che phủ hoàn hảo, lâu trôi và không gây bí da',
                'price' => 1200000,
                'sale_price' => 1000000,
                'stock' => 40,
                'image' => 'images/products/estee-lauder-foundation.jpg',
                'gallery' => json_encode([
                    'images/products/estee-lauder-foundation-1.jpg',
                    'images/products/estee-lauder-foundation-2.jpg'
                ]),
                'status' => true,
                'category_id' => 2
            ],
            [
                'name' => 'Dầu xả Kerastase',
                'description' => 'Dầu xả dưỡng tóc chuyên sâu, giúp tóc mềm mượt và bóng khỏe',
                'price' => 600000,
                'stock' => 60,
                'image' => 'images/products/kerastase-conditioner.jpg',
                'gallery' => json_encode([
                    'images/products/kerastase-conditioner-1.jpg',
                    'images/products/kerastase-conditioner-2.jpg'
                ]),
                'status' => true,
                'category_id' => 3
            ]
        ];

        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            Product::create($product);
        }
    }
}