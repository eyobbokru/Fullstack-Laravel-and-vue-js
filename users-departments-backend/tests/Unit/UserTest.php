<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Department;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 
     * test_can_create_user() ->/api/users
     * test_can_update_user() ->/api/users/{id}
     * test_can_delete_user() -> /api/users/{id}
     * test_cannot_create_user_without_required_data()
     * test_cannot_create_user_with_invalid_email()
     * test_cannot_create_duplicate_user()
     * test_cannot_update_user_with_invalid_data()
     * test_can_retrieve_list_of_users()
     * test_can_retrieve_single_user()
     */
    
    /**
     * @test
     */
    public function test_can_create_user()
    {
        $department = Department::factory()->create();

        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'department_ids' => [$department->id],
        ];

        $response = $this->postJson('/api/users', $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['name' => $userData['name'], 'email' => $userData['email']]);
    }
 
    /**
     * @test
     */
    public function test_can_update_user()
    {
        $user = User::factory()->create();
        $newUserData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ];

        $response = $this->putJson("/api/users/{$user->id}", $newUserData);
        $response->assertStatus(200);
         
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $newUserData['name'],
            'email' => $newUserData['email'],   
        ]);
    }
 
    /**
     * @test
     */
    public function test_can_delete_user()
    {
        $user = User::factory()->create();
        $response = $this->deleteJson("/api/users/{$user->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
 
    /**
     * @test
     */
    public function test_cannot_create_user_without_name()
    {
        $userData = User::factory()->make(['name' => null])->toArray();
        $response = $this->postJson('/api/users', $userData);
        $response->assertStatus(422);
        $this->assertDatabaseMissing('users', $userData);
    }
 
    /**
     * @test
     */
    public function test_cannot_create_duplicate_user()
    {
        $user = User::factory()->create();
        $userData = User::factory()->make(['email' => $user->email])->toArray();
        $response = $this->postJson('/api/users', $userData);
        $response->assertStatus(422);
        $this->assertDatabaseMissing('users', $userData);
    }
 
    
  /**
 * @test
 */
public function test_can_retrieve_list_of_users()
{
    $users = User::factory()->count(3)->create();

    $response = $this->getJson('/api/users');
    $response->assertOk();
    $response->assertJsonCount(3, 'data');
    foreach ($users as $user) {
        $response->assertJsonFragment(['id' => $user->id, 'name' => $user->name, 'email' => $user->email]);
    }
}

/**
 * @test
 */
public function test_can_retrieve_single_user()
{
    $user = User::factory()->create();

    $response = $this->getJson("/api/users/{$user->id}");
    $response->assertOk();
    $response->assertJson(['data' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]]);
}

   
}
