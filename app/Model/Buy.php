<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $table = 'buy';

    const STATUS_DELETE = 0;
    const STATUS_INIT = 1;
    const STATUS_SEND = 2;
    const STATUS_COMPLETE = 3;
}
