<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $param = [
            'name' => 'イタリアン',
        ];
        DB::table('categories')->insert($param);     
        $param = [
            'name' => 'ラーメン',
        ];
        DB::table('categories')->insert($param);           
        $param = [
            'name' => '居酒屋',
        ];
        DB::table('categories')->insert($param); 
        $param = [
            'name' => '寿司',
        ];
        DB::table('categories')->insert($param);     
        $param = [
            'name' => '焼肉',
        ];
        DB::table('categories')->insert($param);           
    }
}
