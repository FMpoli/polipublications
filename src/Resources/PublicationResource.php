<?php

namespace Detit\Polipublications\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Detit\Polinews\Models\Category;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;


use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Detit\Polipublications\Models\Publication;
use Filament\Forms\Components\SpatieTagsInput;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Detit\Polipublications\Resources\PublicationResource\Pages;
// use Filament\Resources\Concerns\Translatable;

class PublicationResource extends Resource
{
    protected static ?string $model = Publication::class;

    protected static ?string $slug = 'publications';

    protected static ?string $recordTitleAttribute = "title";

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Publications';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('polipublications::publications.content'))
                        ->schema([
                            TextInput::make('title')
                                ->label(__('polipublications::publications.title'))
                                ->required()
                                ->live(debounce: 500)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $title = $state;
                                    $slug = Str::slug($title);
                                    $seoTitle = $title;
                                    $set('slug', $slug);
                                })
                                ->maxLength(255)
                                ->required()
                                ->columnSpan(4),
                            TextInput::make('slug')
                                ->label(__('polipublications::publications.slug'))
                                ->disabled()
                                ->hidden()
                                ->columnSpan(3),
                                TextInput::make('authors')
                                ->label(__('polipublications::publications.authors'))
                                ->columnSpan(2),

                            TextInput::make('source')
                                ->label(__('polipublications::publications.source'))
                                ->columnSpan(2),

                            TextInput::make('volume')
                                ->label(__('polipublications::publications.volume'))
                                ->columnSpan(2),
                            TextInput::make('publisher')
                                ->label(__('polipublications::publications.publisher'))
                                ->columnSpan(2),



                        ])->columns(4),

                    ])->columnSpan(2),
                    Forms\Components\Section::make(__('polipublications::publications.data'))
        ->schema([
                                Select::make('type')
                                ->label(__('polipublications::publications.type'))
                                ->options([
                                    'journal' => __('polipublications::publications.journal'),
                                    'conference' => __('polipublications::publications.conference'),
                                    'workshop' => __('polipublications::publications.workshop'),
                                    'book' => __('polipublications::publications.book'),
                                    'thesis' => __('polipublications::publications.thesis'),
                                    'other' => __('polipublications::publications.other'),
                                ])
                                ->required()
                                ->columnSpan(3),
                                TextInput::make('year')
                                ->label(__('polipublications::publications.year'))
                                ->columnSpan(3),
                            TextInput::make('doi')
                                ->label(__('polipublications::publications.doi'))
                                ->columnSpan(3),
                            TextInput::make('issn')
                                ->label(__('polipublications::publications.issn'))
                                ->columnSpan(3),
                            TextInput::make('isbn')
                                ->label(__('polipublications::publications.isbn'))
                                ->columnSpan(3),
                                Toggle::make('is_published')
                                    ->label(__('polipublications::publications.is_published'))
                                    ->columnSpanFull(),

                    ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }

    public static function getRelations(): array
    {
        return [
            // Definisci qui le relazioni, ad esempio:
            // RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublications::route('/'),
            'create' => Pages\CreatePublication::route('/create'),
            'edit' => Pages\EditPublication::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('polipublications::Publications');
    }

    public static function getPluralLabel(): ?string
    {
        return __('polipublications::Publications');
    }

    public static function getLabel(): ?string
    {
        return __('polipublications::Publications');
    }

    public static function getModelLabel(): string
    {
        return __('polipublications::Publications');
    }
}
