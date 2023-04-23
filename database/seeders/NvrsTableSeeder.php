<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NvrsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nvrs')->insert([
            [
                
                'name'          =>  "Dahua 01",         
                'serial'          =>  "FDFSFSDFDS",  
                'version'          =>  "v2",  
                'camera_quantity'          =>  "5",  
                'area_id'          =>  "1",  
                'IP'          =>  "192.168.1.3", 
                'link'          =>  "", 
                'status'          =>  "1", 
                'note'          =>  "",
                'user_id'          =>  "1",    
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                
                'name'          =>  "Dahua 02",         
                'serial'          =>  "FDFSFSDFDB",  
                'version'          =>  "v2",  
                'camera_quantity'          =>  "5",  
                'area_id'          =>  "1",  
                'IP'          =>  "192.168.1.4", 
                'link'          =>  "", 
                'status'          =>  "1", 
                'note'          =>  "",
                'user_id'          =>  "1",    
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
            [
                
                'name'          =>  "Dahua 03",         
                'serial'          =>  "FDFSFSGFDS",  
                'version'          =>  "v2",  
                'camera_quantity'          =>  "5",  
                'area_id'          =>  "1",  
                'IP'          =>  "192.168.1.5", 
                'link'          =>  "", 
                'status'          =>  "1", 
                'note'          =>  "",
                'user_id'          =>  "1",    
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ],
           
            
            
        ]);
    }
}
