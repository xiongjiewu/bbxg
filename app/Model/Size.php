<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

    const STATUS_DELETE = 0;
    const STATUS_USE = 1;

    public function scopeUse($query)
    {
        return $query->where('status', self::STATUS_USE);
    }

}
