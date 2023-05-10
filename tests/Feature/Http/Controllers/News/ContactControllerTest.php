<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateStatus()
    {
        $response = $this->get(route('contacts.create'));

        $response->assertStatus(200);
    }


    public function testStoreStatus()
    {
        $data = [
            'name' => 'test',
            'feedback' => 'lorem inpsum'
        ];

        $response = $this->get(route('contacts.store'), $data);

        $response->assertStatus(200);
    }
}
