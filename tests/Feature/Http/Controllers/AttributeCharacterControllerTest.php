<?php

use App\Models\AttributeCharacter;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;
use App\Models\Attribute;

test('An attribute value is updated correctly', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $character = Character::factory()
        ->for($user)
        ->for(Chronicle::factory()->create())
        ->for(Clan::factory()->create())
        ->for(Predation::factory())
        ->create();

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
