<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;

class UserStatus extends BaseModel
{
    use HasCode;

    public $timestamps = false;
}
