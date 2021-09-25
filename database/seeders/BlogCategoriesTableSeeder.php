<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cname = 'Без категории';
        $categories[] =[
            'title'     => $cname,
            'slug'      => Str::slug($cname),
            'parent_id' => 0
        ];
        for ($i = 1; $i <= 10; $i++){
            $cname = 'Категория #' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[]= [
                'title'     => $cname,
                'slug'      => Str::slug($cname),
                'parent_id' => $parentId,
            ];
        }
        DB::table('blog_categories')->insert($categories);
    }
}
