<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_be_created()
    {
        $this->withoutExceptionHandling();

        $user = [
            'first_name' => 'Big',
            'last_name' => 'Luey',
            'email' => 'luey@u.com',
            'phone_number' => '08055569854',
            'password' => \Hash::make('Luey'),
        ];
        
        $response = $this->post('/api/auth/register', $user);

        $response->assertCreated();
        $this->assertCount(1, User::all());
    }
}
