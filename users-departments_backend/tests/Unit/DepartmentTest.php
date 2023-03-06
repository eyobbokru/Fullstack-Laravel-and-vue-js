<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Department;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * test_can_delete_department()
     * test_can_update_department()
     * test_can_create_department()
     * test_cannot_create_department_without_name()
     * test_cannot_create_duplicate_department()
     * test_can_retrieve_list_of_departments()
     * test_can_retrieve_single_department()
     */

     use RefreshDatabase;

     public function test_can_retrieve_list_of_departments()
     {
         $departments = Department::factory()->count(3)->create();
     
         $response = $this->get('/api/departments');
     
         $response->assertStatus(200);
         $response->assertJsonCount(3, 'data');
         $response->assertJsonStructure([
             'data' => [
                 '*' => ['id', 'name']
             ]
         ]);
     }

    public function test_can_create_department()
    {
        $department = Department::factory()->create();

        $this->assertDatabaseHas('departments', [
            'id' => $department->id,
            'name' => $department->name
        ]);
    }

    public function test_cannot_create_department_without_name()
    {
        $departmentData = [
            'name' => null,
        ];

        $response = $this->post('/api/departments', $departmentData);

        $response->assertStatus(302
    );
        $this->assertDatabaseMissing('departments', $departmentData);
    }

    public function test_cannot_create_duplicate_department()
    {
        $department = Department::factory()->create();

        $departmentData = [
            'name' => $department->name,
        ];

        $response = $this->post('/api/departments', $departmentData);

        $response->assertStatus(302);
        $response->assertJsonMissing([
            'name' => $department->name,
        ]);
    }



    public function test_can_retrieve_single_department()
    {
        $department = Department::factory()->create();

        $response = $this->get("/api/departments/{$department->id}");
    
        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $department->id,
                'name' => $department->name,
                'created_at' => $department->created_at->toISOString(),
                'updated_at' => $department->updated_at->toISOString(),
                'users' => []
            ]);
    }

    public function test_can_update_department()
    {
        $department = Department::factory()->create();

        $data = ['name' => 'New Department Name'];
        $response = $this->put('/api/departments/' . $department->id, $data);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $department->id,
                'name' => 'New Department Name'
            ]
        ]);
    }

    public function test_can_delete_department()
    {
        $department = Department::factory()->create();

        $response = $this->delete('/api/departments/' . $department->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('departments', ['id' => $department->id]);
    }


}
