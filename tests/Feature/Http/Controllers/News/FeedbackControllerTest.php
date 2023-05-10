<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateStatus()
    {
        $response = $this->get(route('feedback.create'));

        $response->assertStatus(200);
    }

    public function testStoreStatus()
    {
        $data = [
            'name' => 'test',
            'phone' => 2322343432,
            'email' => 'test@mail.ru',
            'info' => 'lorem asdasdasdasdasd'
        ];

        $response = $this->get(route('feedback.store'), $data);

        $response->assertStatus(200);
    }
}
