<?php declare(strict_types=1);

namespace spriebsch\ipc;

final readonly class HitShotResult
{
    public function __construct(
        private readonly Ship $ship
    ) {}

    public function ship(): Ship
    {
        return $this->ship;
    }
}