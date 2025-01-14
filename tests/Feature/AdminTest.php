<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Admin()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200)
        ->assertSeeText('Редактировать')
        ->assertSeeText('Спорт')
        ->assertSeeText('Новости');
    }
}
