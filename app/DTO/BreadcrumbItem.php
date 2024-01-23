<?php

declare(strict_types=1);

namespace App\DTO;

class BreadcrumbItem
{
    public function __construct(public string $name, public string $path)
    {
    }
}
