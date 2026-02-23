<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductPagesTest extends TestCase
{
    public function test_individual_product_pages_load()
    {
        $this->get('/products/coconuts')->assertStatus(200);
        $this->get('/products/grains')->assertStatus(200);
        $this->get('/products/pulses')->assertStatus(200);
        $this->get('/products/vegetables')->assertStatus(200);
    }
}
