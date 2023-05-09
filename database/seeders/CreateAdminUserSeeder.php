<?php

namespace Database\Seeders;

//use App\Models\Permission;
//use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator', 
            'email' => 'superadmin@gmail.com',
            'username' => 'administrator',
            'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create(['name' => 'Super-Admin']);
    
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
