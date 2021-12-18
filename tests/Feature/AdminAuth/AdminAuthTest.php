<?php

namespace Tests\Feature\AdminAuth;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function admin_can_register()
    {
        $this->withoutExceptionHandling();

        $admin = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/admin/register',$admin);

        array_splice($admin,2,2);

        $this->assertAuthenticated('admin');
        $this->assertDatabaseHas('admins',$admin);

        $response->assertRedirect('admin/dashboard');

    }

    /** @test */
    public function admin_can_authenticate_and_login()
    {
        $this->withoutExceptionHandling();

        $admin = Admin::factory()->create();

        $response = $this->post('admin/login',[
            'email' => $admin->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect('admin/dashboard');
    }

    /** @test */
    public function admin_can_view_the_registration_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('admin/register');
        $response->assertViewIs('admin.register');
        $response->assertStatus(200);
    }

    /** @test */
    public function admin_can_view_the_login_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('admin/login');
        $response->assertViewIs('admin.login');
        $response->assertStatus(200);
    }
}
