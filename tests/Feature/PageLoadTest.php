<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageLoadTest extends TestCase
{
    public function test_home_page_loads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_about_page_loads()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_products_page_loads()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_contact_page_loads()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
}
