<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'image',
        'content',
        'active  '
    ];

    public static function getTitle(string $key): string
    {
        $widgetTitle = Cache::get('text-widget-' . $key, function ($key) {
            return TextWidget::where('title', $key)->where('active', '=', 1)->first();
        });

        return $widgetTitle ? $widgetTitle->title : '';

    }

    public static function getContent(string $key): string
    {
        $widgetContent = Cache::get('text-widget-' . $key, function ($key) {
            return TextWidget::where('title', $key)->where('active', '=', 1)->first();
        });

        return $widgetContent ? $widgetContent->content : '';

    }
}
