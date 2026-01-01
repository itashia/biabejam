<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_title',
        'site_description',
        'site_keywords',
        'site_url',
        'site_language',
        'site_timezone',
        'site_currency',
        'site_phone',
        'site_email',
        'site_address',
        'logo_dark',
        'logo_light',
        'logo_favicon',
        'logo_apple_touch',
        'og_image',
        'og_type',
        'og_locale',
        'twitter_site',
        'twitter_creator',
        'twitter_card',
        'facebook_app_id',
        'facebook_pixel',
        'google_site_verification',
        'bing_site_verification',
        'yandex_site_verification',
        'google_analytics',
        'google_tag_manager',
        'social_links',
        'meta_tags',
        'schema_markup',
        'custom_css',
        'custom_js',
        'robots_txt',
        'sitemap_xml',
        'maintenance_mode',
        'maintenance_message',
    ];

    protected $casts = [
        'social_links' => 'array',
        'meta_tags' => 'array',
        'schema_markup' => 'array',
        'custom_css' => 'array',
        'custom_js' => 'array',
        'maintenance_mode' => 'boolean',
    ];

    public static function getSettings()
    {
        return cache()->remember('site_settings', 3600, function () {
            return self::first() ?? new self;
        });
    }
}
