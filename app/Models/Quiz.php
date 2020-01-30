<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = ['id'];

    public const DEFAULT_TYPE = 'binary';

    public function __construct(array $attributes = [])
    {
        $attributes['type'] = $attributes['type'] ?? self::DEFAULT_TYPE;

        parent::__construct($attributes);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scopeTypeFilter($query, $type = 'binary')
    {
        return $query->where('type', $type);
    }
}
