<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSlide extends Model
{
    protected $fillable = [
        'image',
        'title',
        'order',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
