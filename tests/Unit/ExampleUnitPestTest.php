<?php

declare(strict_types=1);

test('exampleunitpest', function () {
    expect(true)->toBeTrue();
})->group('testgroup')
->skip(true, 'skipped');
