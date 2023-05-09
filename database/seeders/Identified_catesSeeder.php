<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Identified_catesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identified_cates')->insert([
            ["name"     => "Nhận diện khuôn mặt", "created_at"  => now(), "updated_at"   => now()],
            ["name"     => "Nhận diện biển số xe", "created_at"  => now(), "updated_at"   => now()],
            ["name"     => "Nhận diện đám đông", "created_at"  => now(), "updated_at"   => now()],
        ]);
    }
}
