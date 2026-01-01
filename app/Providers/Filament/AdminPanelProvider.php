<?php

namespace App\Providers\Filament;

use App\Models\Setting;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $settings = Setting::getSettings();

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => [
                    50 => 'oklch(0.985 0 0)',
                    100 => 'oklch(0.967 0.001 286)',
                    200 => 'oklch(0.92 0.004 286)',
                    300 => 'oklch(0.871 0.006 286)',
                    400 => 'oklch(0.705 0.015 286)',
                    500 => 'oklch(0.274 0.006 286)',
                    600 => 'oklch(0.141 0.005 286)',
                    700 => 'oklch(0.21 0.006 286)',
                    800 => 'oklch(0.274 0.006 286)',
                    900 => 'oklch(0.21 0.006 286)',
                    950 => 'oklch(0.141 0.005 286)',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->favicon($settings->logo_favicon ? asset($settings->logo_favicon) : asset('favicon.ico'))
            ->brandLogo($settings->logo_dark ? asset($settings->logo_dark) : asset('./images/logo.png'))
            ->darkModeBrandLogo($settings->logo_light ? asset($settings->logo_light) : asset('./images/logo-dark.png'))
            ->brandLogoHeight('3rem')
            ->brandName($settings->site_name);
    }
}
