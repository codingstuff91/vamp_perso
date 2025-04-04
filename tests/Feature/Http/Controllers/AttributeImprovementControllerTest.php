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
