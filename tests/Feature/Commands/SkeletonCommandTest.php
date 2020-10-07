<?php


namespace Spatie\Skeleton\Tests\Feature\Commands;

class SkeletonCommandTest extends \Spatie\Skeleton\Tests\TestCase
{
    /** @test */
    public function test_command_works()
    {
        $this->artisan('bladeprefix:somecommand')->assertExitCode(0);
        $this->artisan('bladeprefix:somecommand')->expectsOutput('Spatie/Skeleton/hw/tbd');
    }
}
