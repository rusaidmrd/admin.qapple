<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{

    use RefreshDatabase,WithFaker;

    /** @test */
    public function a_multiple_roles_can_assign_to_the_admin()
    {
        $admin = Admin::factory()->create();

        $roleAdmin = Role::create([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);

        $roleManager = Role::create([
            'slug' => 'manager',
            'name' => 'Manager'
        ]);

        $admin->addRoles([$roleAdmin->id,$roleManager->id]);

        $this->assertEquals(2,$admin->noOfRoles());

    }


    /** @test */
    public function a_multiple_permissions_can_assign_to_the_admin()
    {
        $admin = Admin::factory()->create();

        $createRole = Permission::create([
            'slug' => 'create-role',
            'name' => 'Create Role'
        ]);

        $editRole = Permission::create([
            'slug' => 'edit-role',
            'name' => 'Edit Role'
        ]);

        $deleteRole = Permission::create([
            'slug' => 'delete-role',
            'name' => 'Delete Role'
        ]);

        $admin->givePermissionsTo([$createRole->id,$editRole->id,$deleteRole->id]);

        $this->assertEquals(3,$admin->noOfPermissions());
    }
}
