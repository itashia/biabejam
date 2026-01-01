<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->line("\033[1;35m==============================\033[0m");
        $this->command->line("\033[1;36mStarting to create Data Setting 🎯\033[0m");
        $this->command->line("\033[1;35m==============================\033[0m");

        Setting::create([
            'site_name' => 'بیابه جام',
            'site_title' => 'بیابه جام | پلتفرم کاریابی و پروژه‌های فریلنسری ایرانی',
            'site_description' => 'بیابه جام، پلتفرم جامع کاریابی و ثبت پروژه برای فریلنسرها و کارجویان ایرانی. فرصت‌های شغلی جدید، پروژه‌های متنوع و راهکارهای سریع برای پیدا کردن کار مناسب، همه در یک سایت.',
            'site_keywords' => 'کاریابی آنلاین, پروژه فریلنسری, پیدا کردن کار, بیابه جام, شغل ایرانی, فرصت شغلی, ثبت پروژه, جایگزین کاری, مرخصی کاری, فریلنسر',
            'site_url' => config('app.url'),
            'site_language' => 'fa',
            'site_currency' => 'IRT',
            'site_email' => 'info@biabejam.ir',
            'site_phone' => '021-12345678',

            'logo_dark' => 'storage/logos/logo-dark.png',
            'logo_light' => 'storage/logos/logo-light.png',
            'logo_favicon' => 'storage/logos/favicon.ico',
            'logo_apple_touch' => 'storage/logos/apple-touch-icon.png',

            'og_image' => 'storage/og/og-image.jpg',
            'og_type' => 'website',
            'og_locale' => 'fa_IR',

            'twitter_site' => '@biabejam',
            'twitter_creator' => '@biabejam',
            'twitter_card' => 'summary_large_image',

            'google_site_verification' => 'your-google-site-verification-code',
            'bing_site_verification' => 'your-bing-site-verification-code',

            'social_links' => [
                'telegram' => 'https://t.me/biabejam',
                'instagram' => 'https://instagram.com/biabejam',
                'linkedin' => 'https://linkedin.com/company/biabejam',
                'twitter' => 'https://twitter.com/biabejam',
            ],

            'meta_tags' => [
                'name="theme-color" content="#3b82f6"',
                'name="msapplication-TileColor" content="#3b82f6"',
                'name="mobile-web-app-capable" content="yes"',
                'name="apple-mobile-web-app-title" content="بیابه جام"',
                'name="apple-mobile-web-app-capable" content="yes"',
                'name="apple-mobile-web-app-status-bar-style" content="black-translucent"',
            ],

            'schema_markup' => [
                [
                    '@context' => 'https://schema.org',
                    '@type' => 'WebSite',
                    'name' => 'بیابه جام',
                    'url' => config('app.url'),
                    'description' => 'پلتفرم جامع کاریابی و ثبت پروژه برای فریلنسرها و کارجویان ایرانی',
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => config('app.url') . '/search?q={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
                [
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'بیابه جام',
                    'url' => config('app.url'),
                    'logo' => config('app.url') . '/storage/logos/logo-dark.png',
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '021-12345678',
                        'contactType' => 'customer service',
                        'availableLanguage' => ['Persian'],
                    ],
                ],
            ],

            'robots_txt' => "User-agent: *\nAllow: /\nSitemap: " . config('app.url') . '/sitemap.xml',

            'maintenance_mode' => false,
            'maintenance_message' => 'در حال به روزرسانی سرویس... به زودی برمی‌گردیم!',
        ]);

        $this->command->line("\033[1;32m✔\033[0m Setting Data has been added!");
        $this->command->info('All Setting Data have been successfully created ✅ \n');
    }
}
