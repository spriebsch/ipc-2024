<?php declare(strict_types=1);

namespace spriebsch\ipc;

class Cell
{
    private bool $empty = true;

    public function isEmpty(): bool
    {
        return $this->empty;
    }

    public function occupy(Ship $ship): void
    {
        $this->empty = false;
    }

    public function takeShot(): bool
    {
        return !$this->empty;
    }
}