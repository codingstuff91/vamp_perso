<?php

use App\Models\BloodPotency;
use App\Models\Character;
use App\Models\Chronicle;
use App\Models\Clan;
use App\Models\Predation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/
function createUser(string $role = "player") {
    return User::factory()->$role()->create();
}

function createCharacter(User $user = null) {
    $player = $user ?? User::factory()->create();

    return Character::factory()
        ->for($player)
        ->for(BloodPotency::factory()->create())
        ->for(Chronicle::factory()->create())
        ->for(Clan::factory()->create())
        ->for(Predation::factory()->create())
        ->create([
            'name' => 'Dracula Von Helsing',
        ]);
}
