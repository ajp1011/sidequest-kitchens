<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('renders the about page', function (): void {
    $response = get('/about');

    $response->assertOk();
    $response->assertSee('Chef Holly McGrath', escape: false);
    $response->assertSee('Game nights', escape: false);
});
