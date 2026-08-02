<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('renders the order page', function (): void {
    $response = get('/order');

    $response->assertOk();
    $response->assertSee('Quest Order Sheet', escape: false);
    $response->assertSee('Character identity', escape: false);
    $response->assertSee('Seal the quest', escape: false);
});
