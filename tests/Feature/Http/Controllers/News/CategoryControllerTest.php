<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSucssesStatus()
    {
        $response = $this->get(route('news.category'));

        $response->assertStatus(200);
    }
}
