<?php


namespace Spatie\Skeleton\Http\Controllers;

class SkeletonController
{
    public function example()
    {
        return 'hw(Spatie\Skeleton\Http\Controllers\SkeletonController)';
    }

    public function grok_route_to_controller()
    {
        return "Hello from: ".__METHOD__;
    }
}
