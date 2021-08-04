<?php

use Dev\Infrastructure\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [      
            [
                'id' =>1,
                'slug'=>'user_management',
                'name_english' => 'users',
                'name_arabic'=>'المستخدمين',
                'route'=>'/admin/users',
                'icon' =>'person-done-outline',
                'index'=>1
            ],
            [
                'id' =>2,
                'slug'=>'role_management',
                'name_english' => 'Roles',
                'name_arabic'=>'التصريحات',
                'route'=>'/admin/roles',
                'icon' =>'slash-outline',
                'index'=>2
            ],
           
            // user management 
            [
                'slug'=> 'view_user',
                'name_english'=> 'View user',
                'name_arabic'=>'View user',
                'parent_id' =>3
            ],
            [
                'slug'=> 'edit_user',
                'name_english'=> 'Edit user',
                'name_arabic'=>'Edit user',
                'parent_id' =>3
            ],
            [
                'slug'=> 'add_user',
                'name_english'=> 'Add user',
                'name_arabic'=>'Add user',
                'parent_id' =>3
            ],
            [
                'slug'=> 'delete_user',
                'name_english'=> 'Delete user',
                'name_arabic'=>'Delete user',
                'parent_id' =>3
            ],
            [
                'slug'=> 'list_user',
                'name_english'=> 'List users',
                'name_arabic'=>'List users',
                'parent_id' =>3,
                'type'=>'list'
            ],
            // role management 
            [
                'slug'=> 'view_role',
                'name_english'=> 'View Role',
                'name_arabic'=>'View Role',
                'parent_id' =>7
            ],
            [
                'slug'=> 'edit_role',
                'name_english'=> 'Edit Role',
                'name_arabic'=>'Edit Role',
                'parent_id' =>7
            ],
            [
                'slug'=> 'add_role',
                'name_english'=> 'Add Role',
                'name_arabic'=>'Add Role',
                'parent_id' =>7
            ],
            [
                'slug'=> 'delete_role',
                'name_english'=> 'Delete Role',
                'name_arabic'=>'Delete Role',
                'parent_id' =>7
            ],
            [
                'slug'=> 'list_role',
                'name_english'=> 'List Roles',
                'name_arabic'=>'List Roles',
                'parent_id' =>7,
                'type'=>'list'
            ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
