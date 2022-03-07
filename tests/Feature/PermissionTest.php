<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function create_permission_page_can_be_rendered()
    {

        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        $this->get(route('permissions.create'))
            ->assertViewIs('pages.permissions.create')
            ->assertSuccessful();
    }

    /** @test */
    public function a_user_can_add_permission()
    {
        $this->withoutExceptionHandling();

       $this->actingAs(User::factory()->create());

        $permission = [
            'name' => $this->faker->name,
        ];

        $response =  $this->post(route('permissions.store'), $permission);

        $this->assertDatabaseHas('permissions', $permission);
        $response->assertRedirect(route('permissions.index'))->assertSessionHas('success');
    }

    /** @test */
    public function it_requires_a_name()
    {

        $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());

        $permission = Permission::factory()->create();

        $this->post(route('permissions.store'),[
            'name' => ''
        ])->assertSessionHasErrors('name');

        $this->put(route('permissions.update',$permission->id),[
            'name' => ''
        ])->assertSessionHasErrors('name');

    }

    /** @test */
    public function it_cannot_except_duplicate_name()
    {
        $this->withExceptionHandling();
        $this->actingAs(User::factory()->create());

        $permission1 = Permission::factory()->create();
        $permission2 = Permission::factory()->create();

        $this->post(route('permissions.store'),[
            'name' => $permission1->name
        ])->assertSessionHasErrors('name');

        $this->put(route('permissions.update',$permission2->id),[
            'name' => $permission1->name
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    public function permissions_page_can_be_rendered_with_all_permissions_data()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        $permission = Permission::factory()->create();

        $this->get(route('permissions.index'))
            ->assertViewIs('pages.permissions.index')
            ->assertSuccessful()
            ->assertSee($permission->name);
    }

    /** @test */
    public function show_permission_page_can_be_rendered_with_a_single_permission()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        $permission = Permission::factory()->create();

        $this->get(route('permissions.show',$permission->id))
        ->assertViewIs('pages.permissions.show')
        ->assertSuccessful()
        ->assertSee($permission->name);

    }


    /** @test */
    public function edit_permission_page_can_be_rendered()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        $permission = Permission::factory()->create();

        $this->get(route('permissions.edit',$permission->id))
        ->assertViewIs('pages.permissions.edit')
        ->assertSuccessful();
    }

    /** @test */
    public function a_permission_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        Permission::factory()->create();
        $permission = Permission::first();

        $response = $this->put(route('permissions.update',$permission->id),[
            'name' => 'Updated permission'
        ]);

        $this->assertDatabaseHas('permissions',[
            'name' => 'Updated permission'
        ]);

        $response->assertRedirect(route('permissions.index'))->assertSessionHas('success');
    }

     /** @test */
     public function a_permission_can_be_deleted()
     {
         $this->withoutExceptionHandling();
         $this->actingAs(User::factory()->create());

         Permission::factory(10)->create();
         $permission = Permission::first();

         $response = $this->delete(route('permissions.delete',$permission->id));

         $this->assertSoftDeleted($permission);

        $response->assertRedirect(route('permissions.index'))->assertSessionHas('success');
     }
}
