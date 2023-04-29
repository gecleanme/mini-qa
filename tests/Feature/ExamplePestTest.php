<?php

declare(strict_types=1);

use App\Models\User;

uses(\Illuminate\Foundation\Testing\WithFaker::class);
// uses is a helper method to include traits and classes
use function Pest\Laravel\{actingAs, get, post, delete};

beforeEach(function () {
    $this->user = User::factory()->create([
        'role' => 'QA',
        'name' => 'Milad'
    ]);
    //accessed with $this

});

it('has home page', function ($role) {


    //$user =User::find(1);

    $response = actingAs($this->user)->get('/');

    $response->assertStatus(200);

    //Chaining

    expect(User::latest()->first())
        ->role->toBe($role)
      //  ->name->toBe($name)
    ;

})->with('validroles')
    ->group('testgroup');

//with([
//['QA','Milad']// params passed in array
//]);
