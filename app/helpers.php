<?php

use App\BreadcrumbBuilder;
use App\Models\Player;
use App\Models\Score;
use App\Queries\GetBestScoresForPlayer;
use App\Queries\GetPositionForPlayer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

function humanize_value(string $locale, int $value): string {
    $formatter = new NumberFormatter(
        $locale,
        NumberFormatter::DEFAULT_STYLE
    );

    if ($value >= 1_000_000) {
        $text = $value < 2_000_000 ? ' million' : ' millions';

        $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 3);
        $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 3);

        $value = $formatter->format($value / 1_000_000) . $text;

        // NumberFormatter uses narrow non breakable spaces (nnbsp) instead of
        // regular non breakable spaces (nbsp). This is quite confusing.
        // We replace nnbsp with nbsp to have a consistent output.
        return str_replace("\u{202F}", "\u{00A0}", $value);
    }

    $value = $formatter->format($value);

    return str_replace("\u{202F}", "\u{00A0}", $value);
}

function build_breadcrumb(?Model $model = null): array {
    return app(BreadcrumbBuilder::class)->build($model);
}

function million(int|float $value): int|float {
    return $value * 1_000_000;
}
