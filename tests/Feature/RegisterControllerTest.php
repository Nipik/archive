<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class RegisterControllerTest extends TestCase
{
    public function test_store_creates_new_user()
    {
        $data = [
            'name' => 'TestName',
            'lastName' => 'TestLastName',
            'email' => 'testemail@example.com',
            'password' => 'password123',
            'image' => storage_path('app/public/images/test_image.jpg'),
        ];

        $response = $this->post(route('register.store'), $data);


        $response->assertRedirect(route('login'));

        $user = User::where('email', $data['email'])->first();
        $this->assertNotNull($user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertTrue(Hash::check($data['password'], $user->password));
    }
}
