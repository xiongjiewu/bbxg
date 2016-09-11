<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'good';

    const STATUS_DELETE = 0;
    const STATUS_SELL = 1;
    const STATUS_DOWN = 2;


    public function scopeSell($query)
    {
        return $query->where('status', self::STATUS_SELL);
    }

    public function scopeDelete($query)
    {
        return $query->where('status', self::STATUS_DELETE);
    }
}
