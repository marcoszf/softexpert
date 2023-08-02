<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    public function testGetUsers()
    {
        // Assuming you have some test data created for users
        // You can use factories or seeders to create the test data
        // For this example, we assume the endpoint returns a list of users

        // Make a GET request to the /users endpoint
        $response = $this->get('/api/users');

        // Debug: Output the API response to inspect its structure
//        dd($response->json());

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

    }
    // Add other test methods for other API endpoints in a similar fashion
}
