<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';

    const STATUS_DELETE = 0;
    const STATUS_USE = 1;

    public function scopeUse($query)
    {
        return $query->where('status', self::STATUS_USE);
    }
}
