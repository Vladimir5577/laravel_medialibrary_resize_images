<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    // public function test_a_user_can_be_created () {
    //     \App\Models\User::create(['name' => 'Bob', 'email' => 'bob@bob1.com', 'password' => 123]);

    // }
    
    
    // public function test_a_user_can_be_deleted () {
    //     $response = $user = \App\Models\User::where('email', 'bob@bob1.com')->first();
    //     $user->delete();

    //     $response->assertSuccessful();
    // }
    
}
