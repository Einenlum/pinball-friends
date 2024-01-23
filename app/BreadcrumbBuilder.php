<?php

declare(strict_types=1);

namespace App;

use App\DTO\BreadcrumbItem;
use App\Models\Gig;
use App\Models\Pinball;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BreadcrumbBuilder
{
    private const TREE = [
        'gigs.index' => null,
        'players.index' => null,
        'players.create' => 'players.index',
        'players.show' => 'players.index',
        'players.edit' => 'players.show',
        'gigs.create' => 'gigs.index',
        'gigs.show' => 'gigs.index',
        'gigs.edit' => 'gigs.show',
        'pinballs.create' => 'gigs.show',
        'pinballs.show' => 'gigs.show',
        'pinballs.edit' => 'pinballs.show',
    ];

    public function build(?Model $model = null): array
    {
        $request = request();

        return $this->getItems($request->route()->getName(), $model);
    }

    private function getItems(string $routeName, ?Model $model, array $items = []): array
    {
        if (!array_key_exists($routeName, self::TREE)) {
            throw new \Exception(
                "Route \"$routeName\" not found in breadcrumb builder"
            );
        }
        $parentRouteName = self::TREE[$routeName];

        $items = [$this->getSingleItem($routeName, $model), ...$items];

        if ($parentRouteName === null) {
            return $items;
        }

        return $this->getItems($parentRouteName, $model, $items);
    }

    private function getSingleItem(string $routeName, ?Model $model = null): BreadcrumbItem
    {
        return match ($routeName) {
            'gigs.index' => new BreadcrumbItem('Gigs', route('gigs.index')),
            'players.index' => new BreadcrumbItem('Players', route('players.index')),
            'players.create' => new BreadcrumbItem('Add a Player', route('players.create')),
            'players.show' => value(function() use ($model) {
                $player = $this->getPlayer($model);

                return new BreadcrumbItem($player->name, route('players.show', $player));
            }),
            'players.edit' => value(function() use ($model) {
                $player = $this->getPlayer($model);

                return new BreadcrumbItem("Edit {$player->name}", route('players.edit', $player));
            }),
            'gigs.create' => new BreadcrumbItem('Add a Gig', route('gigs.create')),
            'gigs.show' => value(function() use ($model) {
                $gig = $this->getGig($model);

                return new BreadcrumbItem($gig->name, route('gigs.show', $gig));
            }),
            'gigs.edit' => value(function () use ($model) {
                $gig = $this->getGig($model);

                return new BreadcrumbItem(
                    sprintf('Edit %s', $gig->name),
                    route('gigs.edit', $gig)
                );
            }),
            'pinballs.create' => value(function () use ($model) {
                $gig = $this->getGig($model);

                return new BreadcrumbItem(
                    sprintf('Add pinball'),
                    route('pinballs.create', $gig)
                );
            }),
            'pinballs.show' => value(function () use ($model) {
                $pinball = $this->getPinball($model);

                return new BreadcrumbItem(
                    $model->name,
                    route('pinballs.show', $pinball)
                );
            }),
            'pinballs.edit' => value(function () use ($model) {
                $pinball = $this->getPinball($model);

                return new BreadcrumbItem(
                    sprintf('Edit pinball'),
                    route('pinballs.edit', $pinball)
                );
            }),
            default => throw new \Exception("Route {$routeName} not found"),
        };
    }

    private function getPinball(?Model $model): Pinball
    {
        if ($model === null || !$model instanceof Pinball) {
            throw new \Exception('Pinball must be provided');
        }

        return $model;
    }

    private function getGig(?Model $model): Gig
    {
        if ($model === null) {
            throw new \Exception('Model must be provided');
        }

        if ($model instanceof Gig) {
            return $model;
        }

        if ($model instanceof Pinball) {
            return $model->gig;
        }

        throw new \Exception("Can't get gig from model {${get_class($model)}}");
    }

    private function getPlayer(?Model $model): Player
    {
        if ($model === null) {
            throw new \Exception('Model must be provided');
        }

        if ($model instanceof Player) {
            return $model;
        }

        throw new \Exception("Can't get gig from model {${get_class($model)}}");
    }
}
