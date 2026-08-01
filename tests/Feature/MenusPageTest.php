<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('renders the menus page', function (): void {
    $response = get('/menus');

    $response->assertOk();
    $response->assertSee('Menus', escape: false);
    $response->assertSee('Coming soon', escape: false);
});
