<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = ['Заработная плата' , 'Иные Доходы' , 'Продукты питания' , 'Транспорт' , 'Мобильная связь' , 'Интернет' , 'Развлечения' , 'Другое'];
        
        foreach($item as $items) {
            DB::table('categories')->insert([
                'title' => $items,
    
            ]);
        }
    }
}
