<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table = 'classification';

    const STATUS_DELETE = 0;
    const STATUS_USE = 1;

    public function scopeUse($query)
    {
        return $query->where('status', self::STATUS_USE);
    }
}
