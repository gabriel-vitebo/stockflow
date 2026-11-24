<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a página de produtos pode ser acessada', function () {
    $response = $this->get('/products');

    $response->assertStatus(200);
});

test('um produto pode ser cadastrado', function () {
    $product = [
        'name' => 'Teclado Mecânico',
        'sku' => 'TEC-001',
        'price' => 250.00,
        'quantity' => 10,
    ];

    $response = $this->post('/products', $product);

    $response->assertRedirect('/products');

    $this->assertDatabaseHas('products', [
        'sku' => 'TEC-001',
        'name' => 'Teclado Mecânico',
    ]);
});