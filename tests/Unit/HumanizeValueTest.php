<?php

it('humanizes values', function(string $locale, int $value, string $expected) {
    expect(humanize_value($locale, $value))->toBe($expected);
})->with([
    ['fr-FR', 0, '0'],
    ['fr-FR', 100, '100'],
    // This space is a non breakable space (nbsp)
    ['fr-FR', 100_000, '100 000'],
    ['fr-FR', 1_000_000, '1,000 million'],
    ['fr-FR', 1_200_000, '1,200 million'],
    ['fr-FR', 1_228_123, '1,228 million'],
    ['fr-FR', 2_000_000, '2,000 millions'],
    ['fr-FR', 2_123_900, '2,124 millions'],
    // This space is a non breakable space (nbsp)
    ['fr-FR', 274_543_123_900, '274 543,124 millions'],

    ['en', 0, '0'],
    ['en', 100, '100'],
    ['en', 100_000, '100,000'],
    ['en', 1_000_000, '1.000 million'],
    ['en', 1_200_000, '1.200 million'],
    ['en', 1_228_123, '1.228 million'],
    ['en', 2_000_000, '2.000 millions'],
    ['en', 2_123_900, '2.124 millions'],
    ['en', 274_543_123_900, '274,543.124 millions'],
]);
