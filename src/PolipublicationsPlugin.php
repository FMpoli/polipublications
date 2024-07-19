<?php

namespace Detit\Polipublications;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Detit\Polipublications\Resources\PublicationResource;

class PolipublicationsPlugin implements Plugin
{
    public function getId(): string
    {
        return 'polipublications';
    }

    public function register(Panel $panel): void
    {
        $panel
        ->resources([
            PublicationResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
