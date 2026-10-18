<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categories = [
            [
                'name'  => json_encode(['en' => 'Fiction', 'ar' => 'روايات']),
                'slug'  => Str::slug('Fiction'),
                'image' => 'categories/fiction.jpg',
                'status' => 1,
            ],
            [
                'name'  => json_encode(['en' => 'Science', 'ar' => 'العلوم']),
                'slug'  => Str::slug('Science'),
                'image' => 'categories/science.jpg',
                'status' => 1,
            ],
            [
                'name'  => json_encode(['en' => 'History', 'ar' => 'التاريخ']),
                'slug'  => Str::slug('History'),
                'image' => 'categories/history.jpg',
                'status' => 1,
            ],
            [
                'name'  => json_encode(['en' => 'Children Books', 'ar' => 'كتب الأطفال']),
                'slug'  => Str::slug('Children Books'),
                'image' => 'categories/children.jpg',
                'status' => 1,
            ],
            [
                'name'  => json_encode(['en' => 'Religious', 'ar' => 'كتب دينية']),
                'slug'  => Str::slug('Religious'),
                'image' => 'categories/religious.jpg',
                'status' => 1,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
    }

