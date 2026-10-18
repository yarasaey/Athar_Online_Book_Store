<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Authors;
use App\Models\Product;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id')->toArray();
        $authors = Authors::pluck('id')->toArray();

        // Sample product data
        $products = [
            [
                'title' => 'The Forty Rules of Love',
                'slug' => Str::slug('The Forty Rules of Love'),
                'description' => 'A novel by Elif Shafak about love and spirituality inspired by Rumi.',
                'price' => 150.00,
                'compare_price' => 200.00,
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'is_featured' => 'Yes',
                'sku' => 'BOOK-' . strtoupper(Str::random(6)),
                'barcode' => '978-' . rand(100000000, 999999999),
                'track_qty' => 'Yes',
                'qty' => rand(10, 100),
                'status' => 1,
                'photo' => 'products/forty_rules.jpg',
            ],
            [
                'title' => '1984',
                'slug' => Str::slug('1984'),
                'description' => 'George Orwell’s dystopian novel about totalitarianism and surveillance.',
                'price' => 120.00,
                'compare_price' => 160.00,
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'is_featured' => 'No',
                'sku' => 'BOOK-' . strtoupper(Str::random(6)),
                'barcode' => '978-' . rand(100000000, 999999999),
                'track_qty' => 'Yes',
                'qty' => rand(10, 100),
                'status' => 1,
                'photo' => 'products/1984.jpg',
            ],
            [
                'title' => 'عزازيل',
                'slug' => Str::slug('عزازيل'),
                'description' => 'رواية مشوقة للدكتور يوسف زيدان تدور أحداثها في القرن الخامس الميلادي.',
                'price' => 130.00,
                'compare_price' => 180.00,
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'is_featured' => 'Yes',
                'sku' => 'BOOK-' . strtoupper(Str::random(6)),
                'barcode' => '978-' . rand(100000000, 999999999),
                'track_qty' => 'Yes',
                'qty' => rand(10, 100),
                'status' => 1,
                'photo' => 'products/azazel.jpg',
            ],
            [
                'title' => 'ذاكرة الجسد',
                'slug' => Str::slug('ذاكرة الجسد'),
                'description' => 'رواية شهيرة للكاتبة الجزائرية أحلام مستغانمي تتناول الحب والسياسة.',
                'price' => 110.00,
                'compare_price' => 140.00,
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'is_featured' => 'No',
                'sku' => 'BOOK-' . strtoupper(Str::random(6)),
                'barcode' => '978-' . rand(100000000, 999999999),
                'track_qty' => 'Yes',
                'qty' => rand(10, 100),
                'status' => 1,
                'photo' => 'products/memory_body.jpg',
            ],
            [
                'title' => 'Harry Potter and the Philosopher’s Stone',
                'slug' => Str::slug('Harry Potter and the Philosopher’s Stone'),
                'description' => 'J.K. Rowling’s first book in the world-famous Harry Potter series.',
                'price' => 180.00,
                'compare_price' => 220.00,
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'is_featured' => 'Yes',
                'sku' => 'BOOK-' . strtoupper(Str::random(6)),
                'barcode' => '978-' . rand(100000000, 999999999),
                'track_qty' => 'Yes',
                'qty' => rand(10, 100),
                'status' => 1,
                'photo' => 'products/harry_potter1.jpg',
            ],
        ];
        #

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
