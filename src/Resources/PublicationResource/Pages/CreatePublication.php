<?php

namespace Detit\Polipublications\Resources\PublicationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Detit\Polipublications\Resources\PublicationResource;

class CreatePublication extends CreateRecord
{
    // use CreateRecord\Concerns\Translatable;
    protected static string $resource = PublicationResource::class;

    protected function afterSave(): void
    {
        // Qualsiasi logica aggiuntiva dopo il salvataggio
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
