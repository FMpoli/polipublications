<?php

namespace Detit\Polipublications\Resources\PublicationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Detit\Polipublications\Resources\PublicationResource;

class EditPublication extends EditRecord
{
    protected static string $resource = PublicationResource::class;

    protected function afterSave(): void
    {
        // Qualsiasi logica aggiuntiva dopo il salvataggio
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
