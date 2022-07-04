<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    private $credentials = [
        'name' => 'Someone',
        'email' => 'something@something.com',
        'password' => 'password'
    ];
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_signup()
    {
        $response = $this->json('POST', 'api/users/signup', $this->credentials, ['ACCEPT' => 'application/json']);

        $response->assertCreated();
    }

    public function test_user_login(){
        $response = $this->json('POST', 'api/users/login', $this->credentials, ['ACCEPT' => 'application/json']);
        $response->assertOk();
    }
}
