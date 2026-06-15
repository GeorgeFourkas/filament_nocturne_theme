<?php

namespace Nalcom\FilamentNocturneTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Assets\Theme;
use Filament\Support\Color;
use Filament\Support\Facades\FilamentAsset;

class FilamentNocturneTheme implements Plugin
{
    private const PRIMARY_COLOR = [
        'DEFAULT' => '262 83% 58%',
        'dark' => '263 85% 70%',
        'hex' => '#7c3aed',
    ];

    public function getId(): string
    {
        return 'filament-nocturne-theme';
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::register([
            Theme::make('filament-nocturne-theme', __DIR__ . '/../resources/dist/filament-nocturne-theme.css'),
        ], 'nalcom/filament-nocturne-theme');

        $panel
            ->theme('filament-nocturne-theme')
            ->renderHook(
                'panels::sidebar.footer',
                fn (): string => view('')->render(),
            )
            ->renderHook(
                'panels::head.end',
                fn (): string => $this->primaryColorStyles(),
            )
            ->breadcrumbs(false)
            ->maxContentWidth('full');
    }


    private function primaryColorStyles(): string
    {
        $primary = self::PRIMARY_COLOR['DEFAULT'];
        $primaryDark = self::PRIMARY_COLOR['dark'];

        return <<<HTML
            <style>
                :root {
                    --admin-primary: {$primary};
                    --admin-primary-foreground: 0 0% 98%;
                }

                .dark {
                    --admin-primary: {$primaryDark};
                    --admin-primary-foreground: 0 0% 9%;
                }
            </style>
        HTML;
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
