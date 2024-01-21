<?php

use App\Models\Attribute;
use App\Models\Description;
use App\Models\Discipline;
use App\Models\Power;
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

test('It gets the description of a discipline', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $discipline = Discipline::factory()
        ->has(Description::factory())
        ->create();

    $response = $this->post('/descriptions/show', [
        'entity' => "discipline",
        'id' => Discipline::first()->id,
    ]);

    $response->assertStatus(200);
    $response->assertSee($discipline->description->text);
});

test('It gets the description of a power', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $power = Power::factory()
        ->for(Discipline::factory())
        ->has(Description::factory())
        ->create();

    $response = $this->post('/descriptions/show', [
        'entity' => "power",
        'id' => Power::first()->id,
    ]);

    $response->assertStatus(200);
    $response->assertSee($power->description->text);
});
