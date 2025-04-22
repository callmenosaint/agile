<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Chăm sóc da mặt',
                'description' => 'Các sản phẩm chăm sóc da mặt chất lượng cao',
                'image' => 'images/categories/skincare.jpg',
                'status' => true
            ],
            [
                'name' => 'Trang điểm',
                'description' => 'Mỹ phẩm trang điểm đa dạng',
                'image' => 'images/categories/makeup.jpg',
                'status' => true
            ],
            [
                'name' => 'Chăm sóc tóc',
                'description' => 'Sản phẩm chăm sóc tóc chuyên nghiệp',
                'image' => 'images/categories/haircare.jpg',
                'status' => true
            ],
            [
                'name' => 'Nước hoa',
                'description' => 'Nước hoa cao cấp từ các thương hiệu nổi tiếng',
                'image' => 'images/categories/perfume.jpg',
                'status' => true
            ],
            [
                'name' => 'Chăm sóc cơ thể',
                'description' => 'Sản phẩm chăm sóc toàn thân',
                'image' => 'images/categories/bodycare.jpg',
                'status' => true
            ]
        ];

        foreach ($categories as $category) {
            $category['slug'] = Str::slug($category['name']);
            Category::create($category);
        }
    }
}
