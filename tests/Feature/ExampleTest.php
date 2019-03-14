<?php

namespace Tests\Feature;

use App\Book;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertSee('Laravel');

        $response->assertStatus(200);
    }

    public function testRegisterTest()
    {
        $faker = Factory::create();
        $password = $faker->password;
        $response = $this->post('/register', [
            'email' =>  $faker->email,
            'password' =>  $password,
            'password_confirmation' => $password
        ])->assertRedirect('/');

        $response = $this->getJson('/api/books');
        $response->assertExactJson(Book::all()->toArray());

        $response->assertJsonStructure([
            0 => [
                'id',
                'name',
                'price',
                'created_at',
                'updated_at'
            ]
        ]);

//        $response->assertSee('You are logged in!');
    }
}
