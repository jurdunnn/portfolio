<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Closure;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        $fields = [
            TextInput::make('heading')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('position')
                ->required()
                ->numeric()
                ->minValue(0)
                ->columnSpanFull(),

            Checkbox::make('is_intro')
                ->columnSpanFull()
                ->reactive(),

            Textarea::make('intro_text')
                ->hidden(fn ($get) => $get('is_intro') === false),


            Select::make('cv_file')->options(
                collect(Storage::listContents('/')
                    ->toArray())
                    ->mapWithKeys(fn ($file) => [$file['path'] => $file['path']])
                    ->all()
            )
                ->columnSpanFull()
                ->hidden(fn ($get) => $get('is_intro') === false),


            FileUpload::make('Upload A File')
                ->disk('s3')
                ->directory('/')
                ->image()
                ->columnSpan('full')
                ->visibility('public')
                ->preserveFilenames()
                ->hidden(fn ($get) => $get('is_intro') === false),

            TextInput::make('message_link')
                ->columnSpanFull()
                ->hidden(fn ($get) => $get('is_intro') === false),
        ];


        return $form
            ->schema($fields);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position'),
            ])
            ->defaultSort('position')
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
