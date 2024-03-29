<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserRegistration()
    {
        Storage::fake('public');
        $response = $this->post(route('inscription'), [
            'name' => 'PING',
            'email' => 'ping@gmail.com',
            'password' => 'password123',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('users', 1);

        $user = User::first();

        $this->assertEquals('PING', $user->name);
        $this->assertEquals('ping@gmail.com', $user->email);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertStringContainsString('profile_images', $user->image);
    }
}
