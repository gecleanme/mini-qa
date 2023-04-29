<?php

namespace Tests\Feature;

use App\Models\Issue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MyFirstTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $add1 = 5;
        $add2 = 10;
        $result = $add2 + $add1;
        self::assertEquals(15, $result);
    }
}

//    public function test_db_has_data()
//    {
//        $this->assertDatabaseHas('users',[
//        'name' => 'Test User'
//        ]);
//    }
//
//    public function test_post_to_db()
//    {
//
//        $userData  = [
//            'email' => 'test@example.com',
//            'password' => 'password'
//        ];
//
//        Auth::attempt($userData);
//
//
//     $issue_params =[
//         'title' => 'Test Title',
//         'description' => 'Test Description',
//         'priority' => 'High',
//         'department' => 'Android'
//     ];
//
//     $this->post('/issue', $issue_params)->assertStatus(302);
//
//    }
//
//    public function test_db_not_have()
//    {
//        $this->assertDatabaseHas('users',[
//            'name' => 'Daron Spence'
//        ]);
//    }
//}
