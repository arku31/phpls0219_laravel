<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $password = $faker->password(8);
            $browser->visit('/')
                    ->assertSee('Laravel')
                    ->click('.register-link')
                    ->value('#name', $faker->name)
                    ->value('#email', $faker->email)
                    ->value('#password', $password)
                    ->value('#password-confirm', $password)
                    ->press('Register')
                    ->assertSee('You are logged in!');
        });
    }
}
