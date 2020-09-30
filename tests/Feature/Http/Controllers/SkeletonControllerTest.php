<?php


namespace Spatie\Skeleton\Tests\Feature\Http\Controllers;

class SkeletonControllerTest extends \Spatie\Skeleton\Tests\TestCase
{
    /** @test */
    public function it_returns_ok()
    {
        $this
            ->get('/grok/Spatie/Skeleton/string')
            ->assertOk()
            ->assertSee('Hello world.');

//        $prefix = 'Spatie_Skeleton_Prefix'; // this must match/sync with what was put in tests/TestCase.php/setup
//
//        $this
//            ->get("/$prefix/Spatie/Skeleton/example1")
//            ->assertOk()
//            ->assertSee('hw(Spatie\Skeleton\Http\Controllers\SkeletonController)');
    }
}
