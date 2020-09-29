<?php

namespace Spatie\Skeleton\Models;

use Illumiate\Database\Eloquent\Model;


class SkeletonModel extends Model {
    public $gaurded = [];// Defualt to no mass assignements

    //    public function getUpperCasedName() : string {
    //        return strtoupper($this->name);
    //    }
}
