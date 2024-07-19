<?php
namespace Detit\Polipublications\Resources\PublicationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Detit\Polipublications\Resources\PublicationResource;

class ListPublications extends ListRecords
{
    // use ListRecords\Concerns\Translatable;
    protected static string $resource = PublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}


