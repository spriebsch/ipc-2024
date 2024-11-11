<?php declare(strict_types=1);

namespace dein\ipc;

class Cell
{
    private ?Ship $ship = null;

    public function isEmpty(): bool
    {
        return null === $this->ship;
    }

    /**
     * @throws AlreadyOccupiedException
     */
    public function occupy(Ship $ship): void
    {
        if (null !== $this->ship) {
            throw new AlreadyOccupiedException();
        }

        $this->ship = $ship;
    }

    public function takeShot(): ShotResult
    {
        if (null === $this->ship) {
            return new MissShotResult();
        }

        return new HitShotResult($this->ship);
    }
}
