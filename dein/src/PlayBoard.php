<?php

namespace dein\ipc;

class PlayBoard
{
    /** @var array<Cell> */
    private array $cells;

    public function __construct()
    {
        $this->cells = \array_fill(0, 10, new Cell);
    }

    public function getCell(int $int): Cell
    {
        return $this->cells[$int];
    }

    public function takeShotAt(int $int): ShotResult
    {
        return $this->cells[$int]->takeShot();
    }
}
