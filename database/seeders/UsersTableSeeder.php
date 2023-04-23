<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [

                'name'          =>  "Quản trị viên",
                'username'          =>  "admin",
                'email'          =>  "abc@gmail.com",
                'password'       =>   bcrypt('Abc12345'),
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],


        ]);
    }
}
