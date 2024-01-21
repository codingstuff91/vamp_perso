<?php

use App\Models\Attribute;
use App\Models\Description;
use App\Models\User;

test('It gets the description of an attribute', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $attribute = Attribute::factory()
        ->has(Description::factory())
        ->create();

    $response = $this->post('/descriptions/show', [
        'entity' => "attribute",
        'id' => Attribute::first()->id,
    ]);

    $response->assertStatus(200);
    $response->assertSee($attribute->description->text);
});
