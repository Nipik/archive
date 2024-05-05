<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_users()
    {
        User::factory()->count(3)->create();
        $response = $this->get(route('admin.index'));

        $response->assertViewIs('admin.index');
        $response->assertViewHas('users', User::all());
    }

    public function test_edit_returns_view_with_user()
    {
        $user = User::factory()->create();
        $response = $this->get(route('admin.edit', $user->id));
        $response->assertViewIs('admin.edit');
        $response->assertViewHas('user', $user);
    }
    public function test_update_user_updates_user_data()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Updated Name',
            'lastName' => 'Updated LastName',
            'email' => 'updatedemail@example.com',
        ];

        $response = $this->patch(route('admin.update', $user->id), $data);

        $response->assertRedirect(route('admin.index'));

        $user = $user->fresh();
        $this->assertEquals('Updated Name', $user->name);
        $this->assertEquals('Updated LastName', $user->lastName);
        $this->assertEquals('updatedemail@example.com', $user->email);
    }

    public function test_destroy_user_deletes_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('admin.destroy', $user->id));

        $response->assertRedirect(route('admin.index'));

        $this->assertNull(User::find($user->id));
    }

}
