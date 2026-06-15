<?php

namespace Nalcom\FilamentNocturneTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class FilamentNocturneTheme implements Plugin
{
    public function getId(): string
    {
        return 'filament-nocturne-theme';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('filament-nocturne-theme', __DIR__ . '/../resources/dist/filament-nocturne-theme.css'),
        ]);

        $panel
            ->font('DM Sans')
            ->primaryColor(Color::Amber)
            ->secondaryColor(Color::Gray)
            ->warningColor(Color::Amber)
            ->dangerColor(Color::Rose)
            ->successColor(Color::Green)
            ->grayColor(Color::Gray)
            ->theme('filament-nocturne-theme');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
