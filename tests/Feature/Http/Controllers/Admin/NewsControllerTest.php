<?php

namespace Tests\Feature\Р�Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexStatus()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateStatus()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }


    public function testStoreStatus()
    {
        $data = [
            'name' => 'test',
        ];

        $response = $this->get(route('admin.news.store'), $data);

        $response->assertStatus(200);
    }
}
