<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->insert([
            ["name"     => "user-menu", "display_name"  => "Người dùng_Danh mục", "guard_name"   => "web"],
            ["name"     => "user-list", "display_name"  => "Người dùng_Danh sách", "guard_name"   => "web"],
            ["name"     => "user-create", "display_name"  => "Người dùng_Thêm mới","guard_name"   => "web"],
            ["name"     => "user-edit", "display_name"  => "Người dùng_Chỉnh sửa", "guard_name"   => "web"],
            ["name"     => "user-delete","display_name"  => "Người dùng_Xóa","guard_name"   => "web"],

            ["name"     => "camera-menu", "display_name"  => "Danh sách camera_Danh mục", "guard_name"   => "web"],
            ["name"     => "camera-list", "display_name"  => "Danh sách camera_Danh sách", "guard_name"   => "web"],
            ["name"     => "camera-create", "display_name"  => "Danh sách camera_Thêm mới","guard_name"   => "web"],
            ["name"     => "camera-edit", "display_name"  => "Danh sách camera_Chỉnh sửa", "guard_name"   => "web"],
            ["name"     => "camera-delete","display_name"  => "Danh sách camera_Xóa","guard_name"   => "web"],

            ["name"     => "nvr-menu", "display_name"  => "Danh sách nvr_Danh mục", "guard_name"   => "web"],
            ["name"     => "nvr-list", "display_name"  => "Danh sách nvr_Danh sách", "guard_name"   => "web"],
            ["name"     => "nvr-create", "display_name"  => "Danh sách nvr_Thêm mới","guard_name"   => "web"],
            ["name"     => "nvr-edit", "display_name"  => "Danh sách nvr_Chỉnh sửa", "guard_name"   => "web"],
            ["name"     => "nvr-delete","display_name"  => "Danh sách nvr_Xóa","guard_name"   => "web"],

            ["name"     => "identified-menu", "display_name"  => "Danh sách nhận diện_Danh mục", "guard_name"   => "web"],
            ["name"     => "identified-list", "display_name"  => "Danh sách nhận diện_Danh sách", "guard_name"   => "web"],
            ["name"     => "identified-create", "display_name"  => "Danh sách nhận diện_Thêm mới","guard_name"   => "web"],
            ["name"     => "identified-edit", "display_name"  => "Danh sách nhận diện_Chỉnh sửa", "guard_name"   => "web"],
            ["name"     => "identified-delete","display_name"  => "Danh sách nhận diện_Xóa","guard_name"   => "web"],
            ["name"     => "identified-show","display_name"  => "Danh sách nhận diện_xem nhận diện","guard_name"   => "web"],

            ["name"     => "video-menu", "display_name"  => "Danh sách video_Danh mục", "guard_name"   => "web"],
            ["name"     => "video-list", "display_name"  => "Danh sách video_Danh sách", "guard_name"   => "web"],
            ["name"     => "video-create", "display_name"  => "Danh sách video_Thêm mới","guard_name"   => "web"],
            ["name"     => "video-edit", "display_name"  => "Danh sách video_Chỉnh sửa", "guard_name"   => "web"],
            ["name"     => "video-delete","display_name"  => "Danh sách video_Xóa","guard_name"   => "web"],

            ["name"     => "xemtructiep-menu", "display_name"  => "Xem trực tiếp_Danh mục", "guard_name"   => "web"],
            ["name"     => "xemtructiep-view", "display_name"  => "Xem trực tiếp_Xem", "guard_name"   => "web"],

            ["name"     => "bando-menu", "display_name"  => "Bản đô số_Danh mục", "guard_name"   => "web"],
            ["name"     => "bando-view", "display_name"  => "Bản đô số_Xem", "guard_name"   => "web"],
        ]);
    }
}
