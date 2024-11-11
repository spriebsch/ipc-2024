<?php declare(strict_types=1);

namespace spriebsch\ipc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class GuidingTest extends TestCase
{
    public function test_cell_is_initially_empty(): void
    {
        $cell = new Cell;

        $this->assertTrue($cell->isEmpty());
    }

    public function test_cell_can_be_occupied_by_ship(): void
    {
        $cell = new Cell; // Arrange
        $cell->occupy(new Cruiser); // Act

        $this->assertFalse($cell->isEmpty()); // Assert
    }

    public function test_shooting_at_cruiser_is_hit(): void
    {
        $cell = new Cell;
        $cell->occupy(new Cruiser);

        $result = $cell->takeShot();

        $this->assertTrue($result);
    }

    public function test_shooting_at_empty_cell_is_miss(): void
    {
        $cell = new Cell;
        $result = $cell->takeShot();

        $this->assertFalse($result);
    }

    public function test_we_have_a_cruiser(): void
    {
        $this->assertInstanceOf(Cruiser::class, new Cruiser);
    }

    public function test_we_have_a_shot_result_object(): void
    {
        $this->assertInstanceOf(
            HitShotResult::class,
            new HitShotResult(new Cruiser)
        );
    }

    public function test_hit_result_has_ship(): void
    {
        $result = new HitShotResult(new Cruiser);

        $this->assertInstanceOf(Cruiser::class, $result->ship());
    }
}