<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Authors;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $authors = [
            // 🏛 Classic Arabic Authors
            [
                'name' => 'نجيب محفوظ',
                'pio'  => 'أديب مصري حائز على جائزة نوبل في الأدب، اشتهر برواياته عن الحياة في القاهرة.',
            ],
            [
                'name' => 'طه حسين',
                'pio'  => 'عميد الأدب العربي، كاتب وناقد مصري بارز.',
            ],
            [
                'name' => 'مصطفى صادق الرافعي',
                'pio'  => 'شاعر وأديب مصري من رواد الأدب العربي الحديث.',
            ],
            [
                'name' => 'جبران خليل جبران',
                'pio'  => 'شاعر وكاتب وفيلسوف لبناني، من أشهر أعماله "النبي".',
            ],
            [
                'name' => 'نزار قباني',
                'pio'  => 'شاعر سوري معروف بقصائده الرومانسية والسياسية.',
            ],

            // ✍️ Classic English Authors
            [
                'name' => 'William Shakespeare',
                'pio'  => 'English playwright and poet widely regarded as the greatest writer in the English language.',
            ],
            [
                'name' => 'George Orwell',
                'pio'  => 'English novelist best known for "1984" and "Animal Farm".',
            ],
            [
                'name' => 'Jane Austen',
                'pio'  => 'English novelist known for works like "Pride and Prejudice".',
            ],
            [
                'name' => 'Charles Dickens',
                'pio'  => 'English writer and social critic, author of "Oliver Twist" and "A Tale of Two Cities".',
            ],
            [
                'name' => 'Agatha Christie',
                'pio'  => 'Famous English writer known for detective novels featuring Hercule Poirot and Miss Marple.',
            ],

            // 🌍 Modern Arabic Authors
            [
                'name' => 'أحمد خالد توفيق',
                'pio'  => 'كاتب مصري معاصر، رائد أدب الرعب والخيال العلمي العربي.',
            ],
            [
                'name' => 'أدهم شرقاوي',
                'pio'  => 'كاتب لبناني شهير بكتاباته التحفيزية والفكرية مثل "حديث المساء".',
            ],
            [
                'name' => 'أحلام مستغانمي',
                'pio'  => 'كاتبة جزائرية معروفة بروايتها "ذاكرة الجسد".',
            ],
            [
                'name' => 'يوسف زيدان',
                'pio'  => 'كاتب ومفكر مصري، من أشهر رواياته "عزازيل".',
            ],
            [
                'name' => 'إبراهيم عيسى',
                'pio'  => 'كاتب وصحفي مصري معاصر له روايات ذات طابع سياسي وفكري.',
            ],

            // 📚 Modern International Authors
            [
                'name' => 'J.K. Rowling',
                'pio'  => 'British author best known for writing the Harry Potter series.',
            ],
            [
                'name' => 'Stephen King',
                'pio'  => 'American author of horror, supernatural fiction, and suspense novels.',
            ],
            [
                'name' => 'Elif Shafak',
                'pio'  => 'Turkish-British novelist and activist, author of "The Forty Rules of Love".',
            ],
            [
                'name' => 'Yuval Noah Harari',
                'pio'  => 'Israeli historian and author of "Sapiens" and "Homo Deus".',
            ],
            [
                'name' => 'Colleen Hoover',
                'pio'  => 'American novelist known for contemporary romance and emotional storytelling.',
            ],
            [
                'name' => 'Paulo Coelho',
                'pio'  => 'Brazilian author best known for "The Alchemist".',
            ],
            [
                'name' => 'Rupi Kaur',
                'pio'  => 'Canadian poet and illustrator known for her works "Milk and Honey" and "The Sun and Her Flowers".',
            ],
            [
                'name' => 'Khaled Hosseini',
                'pio'  => 'Afghan-American author of "The Kite Runner" and "A Thousand Splendid Suns".',
            ],
        ];

        foreach ($authors as $author) {
            Authors::create($author);
        }
    
    }
}
