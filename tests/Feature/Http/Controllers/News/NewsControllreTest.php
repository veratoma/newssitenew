<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSucsessStatus()
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testShowSucsessStatus()
    {
        $response = $this->get(route('news.show', ['id' => 1]));

        $response->assertStatus(200);
    }

    public function testShowCategorySucsessStatus()
    {
        $response = $this->get(route('news.showCategory', ['id' => 1]));

        $response->assertStatus(200);
    }
}
