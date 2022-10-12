<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PERMISOS ESPECIALES
        $gestionar = Permission::create(['name' => 'gestionar']);
        $historial = Permission::create(['name' => 'historial']);
        $solicitar = Permission::create(['name' => 'solicitar']);
        $assignment_finalizar = Permission::create(['name' => 'assignment.setEnd']);
        //******************************************************** */

        $user_index = Permission::create(['name' => 'user.index']);
        $user_create = Permission::create(['name' => 'user.create']);
        $user_store = Permission::create(['name' => 'user.store']);
        $user_destroy = Permission::create(['name' => 'user.destroy']);
        $user_edit = Permission::create(['name' => 'user.edit']);
        $user_update = Permission::create(['name' => 'user.update']);

        $service_index = Permission::create(['name' => 'service.index']);
        $service_create = Permission::create(['name' => 'service.create']);
        $service_store = Permission::create(['name' => 'service.store']);
        $service_destroy = Permission::create(['name' => 'service.destroy']);
        $service_edit = Permission::create(['name' => 'service.edit']);
        $service_update = Permission::create(['name' => 'service.update']);

        $service_type_index = Permission::create(['name' => 'service_type.index']);
        $service_type_create = Permission::create(['name' => 'service_type.create']);
        $service_type_store = Permission::create(['name' => 'service_type.store']);
        $service_type_destroy = Permission::create(['name' => 'service_type.destroy']);
        $service_type_edit = Permission::create(['name' => 'service_type.edit']);
        $service_type_update = Permission::create(['name' => 'service_type.update']);

        $assignment_index = Permission::create(['name' => 'assignment.index']);
        $assignment_create = Permission::create(['name' => 'assignment.create']);
        $assignment_store = Permission::create(['name' => 'assignment.store']);
        $assignment_destroy = Permission::create(['name' => 'assignment.destroy']);
        $assignment_edit = Permission::create(['name' => 'assignment.edit']);
        $assignment_update = Permission::create(['name' => 'assignment.update']);
        

                //ROLES

        $role1 = Role::create([
            'name' => 'admin'
        ])->syncPermissions([
            $gestionar,
            $historial,
            $solicitar,
            $user_index,
            $user_create,
            $user_store,
            $user_destroy,
            $user_edit,
            $user_update,
            $service_index,
            $service_create,
            $service_store,
            $service_destroy,
            $service_edit,
            $service_update,
            $service_type_index,
            $service_type_create,
            $service_type_store,
            $service_type_destroy,
            $service_type_edit,
            $service_type_update,
            $assignment_index,
            $assignment_create,
            $assignment_store,
            $assignment_destroy,
            $assignment_edit,
            $assignment_update,
        ]);

        $role2 = Role::create([
            'name' => 'tecnico'
        ])->syncPermissions([
            $gestionar,
            $assignment_index,
            $user_edit,
            $user_update,
            $assignment_finalizar,
        ]);

        $role3 = Role::create([
            'name' => 'cliente'
        ])->syncPermissions([
            $historial,
            $solicitar,
            $service_index,
            $service_create,
        ]);;


    }

}
