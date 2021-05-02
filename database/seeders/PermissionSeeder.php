<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=['create_users','view_users','update_users','delete_users','create_admins','view_admins','update_admins','delete_admins','create_roles','view_roles','update_roles','delete_roles','create_permissions','view_permissions','update_permissions','delete_permissions'];    
        foreach ($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }
        
    }
}
