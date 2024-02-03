<?php

use App\Models\AttributeCharacter;
use App\Models\BloodPotency;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;
use App\Models\Attribute;

test('An attribute value is updated correctly', function () {
    $user = createUser();
    $this->actingAs($user);

    $character = createCharacter($user);

    $attribute = Attribute::factory()->create();

    AttributeCharacter::create([
        'character_id' => $character->id,
        'attribute_id' => $attribute->id,
        'attribute_value' => 1,
    ]);

    $response = $this->put("/character/{$character->id}/attribute/{$attribute->id}", [
        "newScore" => 2,
    ]);

    $response->assertStatus(200);

    $newAttributeValue = AttributeCharacter::first()->attribute_value;

    expect($newAttributeValue)->toBe(2);
});
