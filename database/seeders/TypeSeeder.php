<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $item = ['Расход' , 'Доход'];
        
        foreach($item as $items) {
            DB::table('types')->insert([
                'income' => $items,
    
            ]);
        }
    }
}
