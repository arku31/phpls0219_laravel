<?php

namespace Tests\Unit;

use App\Services\BookService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testBookService()
    {
        $bookService = new BookService();
        $response = $bookService->getRandomBookNumber();

        $this->assertTrue(is_numeric($response));
        $this->assertTrue($response < 100);
    }
}
