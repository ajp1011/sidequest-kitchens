<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('renders the home page', function (): void {
    $response = get('/');

    $response->assertOk();
    $response->assertSee('SideQuest Kitchens', escape: false);
    $response->assertSee('Adventure-worthy catering', escape: false);
});
