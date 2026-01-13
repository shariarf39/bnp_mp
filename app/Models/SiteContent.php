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

    /**
     * Get URL value with proper protocol
     */
    public static function getUrl($key, $default = '#')
    {
        $url = self::getValue($key, $default);
        
        // Return default if empty or just #
        if (empty($url) || $url === '#') {
            return $default;
        }
        
        // Add https:// if no protocol specified
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'https://' . $url;
        }
        
        return $url;
    }
}
