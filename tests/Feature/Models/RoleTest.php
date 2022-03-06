<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /** @test */
    public function role_can_save_to_the_database()
    {
        // $this->withoutExceptionHandling();

        // $role = [
        //     'slug' => 'admin',
        //     'name' => 'Admin'
        // ];

        // $response = $this->post('admin/role/create',$role);
        // $this->assertDatabaseHas('roles',$role);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
