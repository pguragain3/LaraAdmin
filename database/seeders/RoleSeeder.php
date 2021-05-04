<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=['superadmin','admin','user'];    
        foreach ($roles as $role){
            Role::create([
                'name'=>$role
            ]);
        }

        $permission=Permission::all()->pluck('id');
        $superadmin=Role::findOrFail(1);
        $superadmin->permissions()->sync($permission);
        $admin=Role::findOrFail(2);
        $adminpermission=Permission::whereIn('name',['create_users','view_users','update_users','delete_users','permanent_delete_users','restore_users','view_deleted_users'])->pluck('id');
        $admin->permissions()->sync($adminpermission);    
    }
}
