<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserDepartmentTest extends TestCase
{

    use RefreshDatabase;
   
    /**
     * test_user_model_has_many_departments()
     * test_department_model_has_many_users()
     * test_user_model_does_not_sync_duplicate_departments()
     * test_department_model_does_not_sync_duplicate_users()
     */

     public function test_user_model_has_many_departments()
     {
         $user = User::factory()->create();
         $departments = Department::factory()->count(3)->create();
     
         $user->departments()->sync($departments->pluck('id'));
     
         $this->assertInstanceOf(Collection::class, $user->departments);
         $this->assertEquals($user->departments->count(), 3);
         $this->assertInstanceOf(Department::class, $user->departments->first());
     }

public function test_department_model_has_many_users()
{
    $department = Department::factory()->create();
    $users = User::factory()->count(3)->create();

    $department->users()->sync($users->pluck('id'));

    $this->assertInstanceOf(Collection::class, $department->users);
    $this->assertEquals($department->users->count(), 3);
    $this->assertInstanceOf(User::class, $department->users->first());
}


public function test_user_model_does_not_sync_duplicate_departments()
{
    $user = User::factory()->create();
    $department = Department::factory()->create();

    $user->departments()->attach($department->id);
    $user->departments()->sync([$department->id]);

    $this->assertInstanceOf(Collection::class, $user->departments);
    $this->assertEquals($user->departments->count(), 1);
}

public function test_department_model_does_not_sync_duplicate_users()
{
    $department = Department::factory()->create();
    $user = User::factory()->create();

    $department->users()->attach($user->id);
    $department->users()->sync([$user->id]);

    $this->assertInstanceOf(Collection::class, $department->users);
    $this->assertEquals($department->users->count(), 1);
}


}
