<?php

namespace Spatie\Skeleton\Tests\Feature\Models;

use Spatie\Skeleton\Models\SkeletonModel;
use Spatie\Skeleton\Tests\TestCase;

class SkeletonModelTest extends TestCase {
    /* test */
    public function it_can_create_a_model() {
        $model = SkeletonModel::create(['name'=>'John']);
        $this->assertDatabaseCount('SkeletonModel', 1);
        $this->assertEquals('John',$model->getUpperCaseName());
    }
}
