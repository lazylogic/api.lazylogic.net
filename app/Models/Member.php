<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Lazylogic\Additive\Models\Additives;
use Lazylogic\Additive\Models\Pageable;

class Member extends Model
{
    use Additives, Pageable;
}