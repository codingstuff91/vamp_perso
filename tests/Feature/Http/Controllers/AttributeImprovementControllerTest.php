<?php

use App\Models\Attribute;
use App\Models\AttributeCharacter;

test('The index page is rendered', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user);

    $attribute = Attribute::factory()->create();

    AttributeCharacter::create([
        'character_id' => $character->id,
        'attribute_id' => $attribute->id,
        'attribute_value' => 1,
    ]);

    $response = $this->get(route('attribute_improve.index', [
        'character' => $character->id,
        'attribute' => $attribute->id,
    ]));

    $response->assertStatus(200);
});

test('Decrease experience points from a character', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user, experiencePoints: 10);

    $attribute = Attribute::factory()->create();

    AttributeCharacter::create([
        'character_id' => $character->id,
        'attribute_id' => $attribute->id,
        'attribute_value' => 1,
    ]);

    $this->put(route('attribute_improve.update', [
        'character' => $character->id,
        'attribute' => $attribute->id,
    ]), [
        'newScore' => 2,
        'consumedExperiencePoints' => 8,
    ]);

    $character->refresh();

    expect($character->experience_points)->toBe(2);
});

test('Increase attribute value', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user, experiencePoints: 10);

    $attribute = Attribute::factory()->create();

    AttributeCharacter::create([
        'character_id' => $character->id,
        'attribute_id' => $attribute->id,
        'attribute_value' => 1,
    ]);

    $this->put(route('attribute_improve.update', [
        'character' => $character->id,
        'attribute' => $attribute->id,
    ]), [
        'newScore' => 2,
        'consumedExperiencePoints' => 8,
    ]);

    $attributeCharacter = AttributeCharacter::where('character_id', $character->id)
        ->where('attribute_id', $attribute->id)
        ->first();

    expect($attributeCharacter->attribute_value)->toBe(2);
});
