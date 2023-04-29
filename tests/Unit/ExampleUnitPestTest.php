<?php

test('exampleunitpest', function () {
    expect(true)->toBeTrue();
})->group('testgroup')
->skip(true, 'skipped' );
