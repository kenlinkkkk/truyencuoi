<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Truyện dân gian',
                'short_tag' => 'truyen-dan-gian',
                'status' => 1
            ],
            [
                'name' => 'Truyện nước ngoai',
                'short_tag' => 'truyen-nuoc-ngoai',
                'status' => 1
            ],
            [
                'name' => 'Ảnh hài hước',
                'short_tag' => 'anh-hai-huoc',
                'status' => 1
            ]
        ];

        Category::insert($data);
    }
}
