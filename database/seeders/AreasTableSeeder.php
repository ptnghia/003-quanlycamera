<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                
                'name'          =>  "Hàm Thuận Bắc",            
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                
                'name'          =>  "Hàm Thuận Nam",            
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                
                'name'          =>  "Phan Thiết",            
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            
            
        ]);
    }
}
