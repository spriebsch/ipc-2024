<?php declare(strict_types=1);

namespace dein\ipc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertInstanceOf;

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

        $this->assertInstanceOf(HitShotResult::class, $result);
    }

    public function test_shooting_at_empty_cell_is_miss(): void
    {
        $cell = new Cell;
        $result = $cell->takeShot();

        $this->assertInstanceOf(MissShotResult::class, $result);
    }

    public function test_we_have_a_cruiser(): void
    {
        $cell = new Cell;
        $cell->occupy(new Cruiser);

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

    public function test_already_occupied_cell_throws_exception(): void
    {
        $this->expectException(AlreadyOccupiedException::class);

        $cell = new Cell;
        $cell->occupy(new Cruiser());
        $cell->occupy(new Cruiser());
    }

    public function test_hit_shot_result_contains_ship_name(): void
    {
        $cell = new Cell;
        $cell->occupy(new Cruiser);
        $result = $cell->takeShot();

        $this->assertSame('Cruiser', $result->ship()->getName());
    }

    public function test_play_board_exists(): void
    {
        self::assertInstanceOf(PlayBoard::class, new PlayBoard());
    }

    public function test_play_board_get_cell_at(): void
    {
        $playBoard = new PlayBoard();

        $this->assertInstanceOf(Cell::class, $playBoard->getCell(5));
    }

    public function test_play_board_take_shot_successfully(): void
    {
        $playBoard = new PlayBoard();

        assertInstanceOf(ShotResult::class, $playBoard->takeShotAt(3));
    }

    public function test_play_board_occupy_cell_at_index(): void
    {
        $playBoard = new PlayBoard();

        $this->assertTrue($playBoard->occupyCellAt(4, new Cruiser()));
    }
}
