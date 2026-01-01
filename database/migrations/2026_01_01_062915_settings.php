<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name');
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_url');
            $table->string('site_language')->default('fa');
            $table->string('site_timezone')->default('Asia/Tehran');
            $table->string('site_currency')->default('IRT');
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_address')->nullable();

            $table->string('logo_dark')->nullable();
            $table->string('logo_light')->nullable();
            $table->string('logo_favicon')->nullable();
            $table->string('logo_apple_touch')->nullable();

            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_locale')->default('fa_IR');

            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('twitter_card')->default('summary_large_image');

            $table->string('facebook_app_id')->nullable();
            $table->string('facebook_pixel')->nullable();

            $table->string('google_site_verification')->nullable();
            $table->string('bing_site_verification')->nullable();
            $table->string('yandex_site_verification')->nullable();

            $table->string('google_analytics')->nullable();
            $table->string('google_tag_manager')->nullable();

            $table->json('social_links')->nullable();
            $table->json('meta_tags')->nullable();
            $table->json('schema_markup')->nullable();
            $table->json('custom_css')->nullable();
            $table->json('custom_js')->nullable();

            $table->text('robots_txt')->nullable();
            $table->text('sitemap_xml')->nullable();

            $table->boolean('maintenance_mode')->default(false);
            $table->text('maintenance_message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
