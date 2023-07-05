<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        'name' => 'samirgamal',
        'email' => 'samir.gamal77@yahoo.com',
        'password' => bcrypt('123456'),
        'roles_name' => ["owner"],
        'Status' => 'مفعل',
        ]);

        $user1 = User::create([
            'name' => 'nermen',
            'email' => 'nermen@gmail.com',
            'password' => bcrypt('123456'),
            'roles_name' => ["user"],
            'Status' => 'مفعل',
            ]);


        $user2 = User::create([
            'name' => 'bana',
            'email' => 'bana@gmail.com',
            'password' => bcrypt('123456'),
            'roles_name' => ["user"],
            'Status' => 'مفعل',
            ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $role1 = Role::create(['name' => 'user']);
        $permissions1 = Permission::pluck('id','id')->all();
        $role1->syncPermissions($permissions);
        $user1->assignRole([$role->id]);


        $permissions2 = Permission::pluck('id','id')->all();
        $role1->syncPermissions($permissions);
        $user2->assignRole([$role->id]);
}
}

