<?php

namespace Tests\Feature\AdminAuth;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAuthTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */
    public function admin_can_register()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post(route('admin.register'),$attributes);
        array_splice($attributes,2,2);

        $admin = Admin::latest()->first();

        $this->assertDatabaseHas('admins',$attributes);

        $this->assertDatabaseHas('admins_roles',[
            'admin_id' => $admin->id
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect(route('admin.dashboard'));

    }

    /** @test */
    public function admin_can_authenticate_and_login()
    {
        $this->withoutExceptionHandling();

        $admin = Admin::factory()->create();

        $response = $this->post(route('admin.login'),[
            'email' => $admin->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect(route('admin.dashboard'));
    }

    /** @test */
    public function admin_cannot_view_login_form_when_authenticated()
    {
        $admin = Admin::factory()->make();
        $response = $this->actingAs($admin,'admin')->get('/login');
        $response->assertRedirect(route('admin.dashboard'));
    }

    /** @test */
    public function admin_cannot_authenticate_with_wrong_password()
    {
        $admin = Admin::factory()->create();
        $this->post('/login', [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);



        $this->assertGuest('admin');
    }

    /** @test */
    public function admin_cannot_authenticate_with_wrong_email()
    {
        $admin = Admin::factory()->create();
        $this->post('/login', [
            'email' => 'wrongemail@gmail.com',
            'password' => 'password',
        ]);
        $this->assertGuest('admin');
    }

    /** @test */
    public function admin_can_view_the_registration_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('admin.register.page'));
        $response->assertViewIs('admin.register');
        $response->assertStatus(200);
    }

    /** @test */
    public function admin_can_view_the_login_page()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('admin.login.page'));
        $response->assertViewIs('admin.login');
        $response->assertStatus(200);
    }
}
