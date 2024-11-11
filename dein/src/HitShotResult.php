<?php declare(strict_types=1);

namespace dein\ipc;

final readonly class HitShotResult extends ShotResult
{
    public function __construct(
        private Ship $ship
    ) {}

    public function ship(): Ship
    {
        return $this->ship;
    }
}
