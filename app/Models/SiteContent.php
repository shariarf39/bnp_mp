<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = ['key', 'value', 'section'];

    public static function getValue($key, $default = '')
    {
        $content = self::where('key', $key)->first();
        return $content ? $content->value : $default;
    }

    public static function setValue($key, $value, $section = null)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'section' => $section]
        );
    }
}
