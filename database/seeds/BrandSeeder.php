<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cheak if table brands is empty

        DB::table('brands')->delete();

//            for ($i=0; $i < 20; $i++){
//                DB::table('brands')->insert([
//                    'name' => str::random(5),
//                    'is_active' => true && false,
//
//                ]);

//        }

    }
}
