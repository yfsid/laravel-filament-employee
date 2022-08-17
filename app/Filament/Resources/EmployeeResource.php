<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\State;
use App\Models\Country;
use App\Models\Employee;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Widgets\EmployeeStatsOverview;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('country_id')
                            ->label('Country')
                            ->required()
                            ->options(Country::all()->pluck('name', 'id')->toArray())
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('state_id', '')),
                        Select::make('state_id')
                            ->label('State')
                            ->required()
                            ->options(function (callable $get) {
                                $country = Country::find($get('country_id'));
                                if (!$country) {
                                    return State::all()->pluck('name', 'id');
                                }
                                return $country->states->pluck('name', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('city_id', '')),
                        Select::make('city_id')
                            ->label('City')
                            ->required()
                            ->options(function (callable $get) {
                                $state = State::find($get('state_id'));
                                if (!$state) {
                                    return City::all()->pluck('name', 'id');
                                }
                                return $state->cities->pluck('name', 'id');
                            })
                            ->required(),
                        Select::make('department_id')
                            ->relationship('department', 'name')
                            ->required(),
                        TextInput::make('first_name')
                            ->dehydrateStateUsing(fn ($state) => Str::title($state))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('last_name')
                            ->dehydrateStateUsing(fn ($state) => Str::title($state))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('address')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('zip_code')
                            ->required()
                            ->maxLength(5),
                        DatePicker::make('birth_date')
                            ->required(),
                        DatePicker::make('hired_date')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->sortable(['first_name', 'last_name'])
                    ->searchable(),
                TextColumn::make('department.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('hired_date')
                    ->label('Join Year')
                    ->date()
            ])
            ->filters([
                SelectFilter::make('department')
                    ->relationship('department', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            EmployeeStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
