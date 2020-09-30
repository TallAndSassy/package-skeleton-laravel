<?php


namespace Spatie\Skeleton\Tests\Feature\Http\Controllers;

class SkeletonControllerTest extends \Spatie\Skeleton\Tests\TestCase
{
    /** @test */
    public function it_returns_ok()
    {
        $this
            ->get('/Spatie/Skeleton')
            ->assertOk()
            ->assertSee('ok');
    }
}
